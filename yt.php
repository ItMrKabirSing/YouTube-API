<?php
header('Content-Type: application/json');

// Your YouTube Data API key
define("YOUTUBE_API_KEY", "AIzaSyBZKN7j0rj22Da7uTbY0E-SIHSn3WGlgZ4");
define("YOUTUBE_SEARCH_API_URL", "https://www.googleapis.com/youtube/v3/search");
define("YOUTUBE_VIDEOS_API_URL", "https://www.googleapis.com/youtube/v3/videos");

// Extract video ID from YouTube URL
function extractVideoIdFromUrl($url) {
    $regex = '/(?:https?:\/\/)?(?:www\.)?youtube\.com\/.*(?:v=|\/)([\w-]+)|youtu\.be\/([\w-]+)/';
    preg_match($regex, $url, $matches);
    return $matches[1] ?? $matches[2] ?? null;
}

// Fetch video details from YouTube API
function fetchVideoDetails($videoId) {
    $apiUrl = YOUTUBE_VIDEOS_API_URL . "?part=snippet,statistics,contentDetails&id={$videoId}&key=" . YOUTUBE_API_KEY;
    $response = file_get_contents($apiUrl);
    if ($response === FALSE) {
        return ["error" => "Failed to fetch video details."];
    }

    $data = json_decode($response, true);
    if (empty($data['items'])) {
        return ["error" => "No video found for the provided ID."];
    }

    $video = $data['items'][0];
    $snippet = $video['snippet'];
    $stats = $video['statistics'];
    $contentDetails = $video['contentDetails'];

    return [
        "title" => $snippet['title'],
        "channel" => $snippet['channelTitle'],
        "description" => $snippet['description'],
        "imageUrl" => $snippet['thumbnails']['high']['url'],
        "link" => "https://youtube.com/watch?v={$video['id']}",
        "duration" => parseDuration($contentDetails['duration']),
        "views" => $stats['viewCount'] ?? "N/A",
        "likes" => $stats['likeCount'] ?? "N/A",
        "comments" => $stats['commentCount'] ?? "N/A"
    ];
}

// Fetch search results from YouTube API
function fetchSearchData($query) {
    $searchApiUrl = YOUTUBE_SEARCH_API_URL . "?part=snippet&q=" . urlencode($query) . "&type=video&maxResults=10&key=" . YOUTUBE_API_KEY;
    $searchResponse = file_get_contents($searchApiUrl);
    if ($searchResponse === FALSE) {
        return ["error" => "Failed to fetch search data."];
    }

    $searchData = json_decode($searchResponse, true);
    $videoIds = array_map(function($item) {
        return $item['id']['videoId'];
    }, $searchData['items']);

    // Fetch additional video statistics and duration
    $videosApiUrl = YOUTUBE_VIDEOS_API_URL . "?part=snippet,statistics,contentDetails&id=" . implode(",", $videoIds) . "&key=" . YOUTUBE_API_KEY;
    $videosResponse = file_get_contents($videosApiUrl);
    if ($videosResponse === FALSE) {
        return ["error" => "Failed to fetch video details."];
    }

    $videosData = json_decode($videosResponse, true);
    $videosMap = [];
    foreach ($videosData['items'] as $video) {
        $videosMap[$video['id']] = $video;
    }

    $result = [];
    foreach ($searchData['items'] as $item) {
        $videoId = $item['id']['videoId'];
        $snippet = $item['snippet'];
        $video = $videosMap[$videoId];
        $contentDetails = $video['contentDetails'];
        $stats = $video['statistics'];

        $result[] = [
            "title" => $snippet['title'],
            "channel" => $snippet['channelTitle'],
            "imageUrl" => $snippet['thumbnails']['high']['url'],
            "link" => "https://youtube.com/watch?v={$videoId}",
            "duration" => parseDuration($contentDetails['duration']),
            "views" => $stats['viewCount'] ?? "N/A",
            "likes" => $stats['likeCount'] ?? "N/A",
            "comments" => $stats['commentCount'] ?? "N/A"
        ];
    }

    return $result;
}

// Helper function to parse ISO 8601 duration into human-readable format
function parseDuration($duration) {
    $interval = new DateInterval($duration);
    $formatted = "";
    if ($interval->h > 0) {
        $formatted .= $interval->h . "h ";
    }
    if ($interval->i > 0) {
        $formatted .= $interval->i . "m ";
    }
    if ($interval->s > 0) {
        $formatted .= $interval->s . "s";
    }
    return trim($formatted);
}

// Main logic
if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $query = $_GET['query'] ?? null;

    if (!$query) {
        echo json_encode(["status" => false, "message" => "Query parameter is missing"]);
        http_response_code(400);
        exit;
    }

    // Check if query is a YouTube video URL
    $videoId = extractVideoIdFromUrl($query);
    if ($videoId) {
        $videoData = fetchVideoDetails($videoId);
        if (isset($videoData['error'])) {
            echo json_encode(["status" => false, "message" => $videoData['error']]);
            http_response_code(500);
        } else {
            echo json_encode(["status" => true, "creator" => "API DEVELOPER @TheSmartDev & @ISmartDevs", "result" => $videoData]);
        }
    } else {
        $searchData = fetchSearchData($query);
        if (isset($searchData['error'])) {
            echo json_encode(["status" => false, "message" => $searchData['error']]);
            http_response_code(500);
        } else {
            echo json_encode(["status" => true, "creator" => "API DEVELOPER @TheSmartDev & @ISmartDevs", "result" => $searchData]);
        }
    }
}