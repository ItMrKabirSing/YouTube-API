## YouTube API 🚀🎥

Welcome to the **YouTube API** 🌟, a powerful PHP-based API for fetching YouTube video details and search results, built with 💖 by **Abir Arafat Chawdhury** 🇧🇩, the coding maestro from **@ISmartDevs** and **@TheSmartDev**! 🎉 Whether you’re searching for videos by song name 🎶 or diving into specifics with a video URL 🔗, this API delivers rich data with a sprinkle of tech magic! ⚙️✨

## What is YouTube API? ❓💥

This API is a sleek tool that uses the **YouTube Data API v3** to interact with YouTube’s vast video library, created by **Abir Arafat Chawdhury**, the genius behind **SmartToolsBot** and CEO of **SmartDev**. With expertise in **Python**, **JavaScript**, **PHP**, and **full-stack web development**, Abir has crafted an API that’s both powerful and easy to use! 🌐💫

- **Hosted at**: [abirthetech.serv00.net/yt.php](https://abirthetech.serv00.net/yt.php) 📡
- **GitHub Repo**: [github.com/TheSmartDev/YouTube-API](https://github.com/TheSmartDev/YouTube-API) 📛
- **Features**:
  - Fetch video details (title, channel, description, thumbnail, duration, views, likes, comments) from a YouTube URL. 🎬
  - Search for videos by query (e.g., song name) and get up to 10 results with rich metadata. 🔍
  - Clean JSON responses with a developer signature. ✅

## Response Formats 📊✨

### 1. Search by Query (e.g., Song Name) 🎵  
Example: [abirthetech.serv00.net/yt.php?query=tum+hi+ho](https://abirthetech.serv00.net/yt.php?query=tum+hi+ho)

```json
{
  "status": true,
  "creator": "API DEVELOPER @TheSmartDev & @ISmartDevs",
  "result": [
    {
      "title": "\"Tum Hi Ho\" Aashiqui 2 Full Song With Lyrics | Aditya Roy Kapur, Shraddha Kapoor",
      "channel": "T-Series",
      "imageUrl": "https://i.ytimg.com/vi/Umqb9KENgmk/hqdefault.jpg",
      "link": "https://youtube.com/watch?v=Umqb9KENgmk",
      "duration": "4m 28s",
      "views": "438075911",
      "likes": "2948207",
      "comments": "116629"
    },
    {
      "title": "\"Tum Hi Ho Aashiqui 2\" Full Video Song HD | Aditya Roy Kapur, Shraddha Kapoor | Music - Mithoon",
      "channel": "T-Series",
      "imageUrl": "https://i.ytimg.com/vi/IJq0yyWug1k/hqdefault.jpg",
      "link": "https://youtube.com/watch?v=IJq0yyWug1k",
      "duration": "5m 10s",
      "views": "321737239",
      "likes": "2849522",
      "comments": "87893"
    }
    // ... more results
  ]
}
```

### 2. Video Details by URL 🎥  
Example: [abirthetech.serv00.net/yt.php?query=https://youtube.com/watch?v=asxmdFaIock](https://abirthetech.serv00.net/yt.php?query=https://youtube.com/watch?v=asxmdFaIock)

```json
{
  "status": true,
  "creator": "API DEVELOPER @TheSmartDev & @ISmartDevs",
  "result": {
    "title": "Meri Aashiqui Ab Tum Hi Ho Full Song (Lyrics) - Arijit Singh | Lyrics Tube",
    "channel": "Lyrics Tube 💕",
    "description": "Meri Aashiqui Ab Tum Hi Ho Full Song (Lyrics) - Arijit Singh | Lyrics Tube\n\nPlease Make Sure To Like, Share And Subscribe.☺☺☺\n\nFull Song Lyrics:\n\nHum tere bin ab reh nahi sakte...",
    "imageUrl": "https://i.ytimg.com/vi/asxmdFaIock/hqdefault.jpg",
    "link": "https://youtube.com/watch?v=asxmdFaIock",
    "duration": "5m 46s",
    "views": "13597456",
    "likes": "215129",
    "comments": "4568"
  }
}
```

## Features 🌟⚙️

- **Video Details**: Extract title, channel, description, thumbnail, duration, views, likes, and comments from a YouTube URL. 📹
- **Search Videos**: Find up to 10 videos by query (e.g., song name, artist) with detailed metadata. 🔎
- **Human-Readable Duration**: Converts ISO 8601 durations (e.g., PT5M46S) into formats like `5m 46s`. ⏱️
- **Error Handling**: Graceful responses for invalid queries or API errors. ❌
- **Lightweight**: Single PHP file for easy deployment. ⚡

## How to Use YouTube API 🛠️💥

1. **Try it Live**:  
   - Search by song: [abirthetech.serv00.net/yt.php?query=tum+hi+ho](https://abirthetech.serv00.net/yt.php?query=tum+hi+ho) 🎶  
   - Video details: [abirthetech.serv00.net/yt.php?query=https://youtube.com/watch?v=asxmdFaIock](https://abirthetech.serv00.net/yt.php?query=https://youtube.com/watch?v=asxmdFaIock) 🎥

2. **Host Your Own**:  
   - Download `yt.php` from the [GitHub repo](https://github.com/TheSmartDev/YouTube-API). 📥  
   - Upload it to your server via cPanel or any web hosting service. 📤  
   - Replace `YOUTUBE_API_KEY` in `yt.php` with your YouTube Data API key. 🔑  
   - Access your endpoint: `yourdomain.com/yt.php?query={query}` 🌍  
   - Done! Your YouTube API is live! 🚀

3. **Get a YouTube Data API Key**:  
   To use this API, you need a **YouTube Data API v3** key from Google Cloud. Follow these detailed steps to sign up and enable the API:  
   - **Step 1: Sign Up for Google Cloud**  
     - Visit [Google Cloud Console](https://console.cloud.google.com/). 🔐  
     - Sign in with your Google account or create a new one.  
     - If prompted, agree to the terms of service and set up a billing account (required for API access, though free tier may suffice for limited usage).  
   - **Step 2: Create a Project**  
     - Click the project dropdown at the top and select **New Project**.  
     - Give your project a name (e.g., `YouTube-API-Project`) and click **Create**.  
   - **Step 3: Enable YouTube Data API v3**  
     - Go to the **API & Services** > **Library** section in the Google Cloud Console.  
     - Search for **YouTube Data API v3** and click on it.  
     - Click **Enable** to activate the API for your project. ⚙️  
   - **Step 4: Generate an API Key**  
     - Navigate to **API & Services** > **Credentials**.  
     - Click **Create Credentials** > **API Key**.  
     - Copy the generated API key. 🔑  
     - (Optional) Restrict the key to the YouTube Data API v3 for security under the **API restrictions** tab.  
   - **Step 5: Add API Key to `yt.php`**  
     - Open `yt.php` and replace the placeholder with your key:  
       ```php
       define("YOUTUBE_API_KEY", "your_actual_youtube_api_key_here");
       ```

## Installation Guide 🖥️✨

1. Clone the repo:
   ```bash
   git clone https://github.com/TheSmartDev/YouTube-API.git
   ```
2. Upload `yt.php` to your server’s root or a subdirectory. 📂
3. Edit `yt.php` and insert your **YouTube Data API key**:
   ```php
   define("YOUTUBE_API_KEY", "your_actual_youtube_api_key_here");
   ```
4. Ensure your server supports **PHP** and **file_get_contents**. ✅
5. Test your endpoint: `yourdomain.com/yt.php?query=tum+hi+ho` 🚀

## Why YouTube API? 🌟

- **Creator Cred**: Built by **Abir Arafat Chawdhury**, a coding legend from **@ISmartDevs** and **@TheSmartDev**. 🧙‍♂️
- **Powered by YouTube Data API v3**: Leverages Google’s official API for reliable data. 📡
- **Versatile**: Handles both video URLs and search queries with ease. 🎯
- **Simple Deployment**: One PHP file, no fuss! ⚡
- **Rich Data**: Pulls detailed video info for your apps or projects. 📊
- **Reliable**: Robust error handling and clean JSON output. ✅

## Contributing 🤝💖

Love to make this API even better? Fork the repo, add your spark, and submit a pull request! Let’s create something epic together. 🌈  
Visit the [GitHub repo](https://github.com/TheSmartDev/YouTube-API) for details. 📛

## About the Creator 👨‍💻🇧🇩

**Abir Arafat Chawdhury** is the mastermind behind this API. As the CEO of **SmartDev**, creator of **SmartToolsBot**, and a full-stack guru, Abir shines in **Python**, **JavaScript**, **PHP**, and more. Follow his work at **@ISmartDevs** and **@TheSmartDev** for tech brilliance! 🌟

## License 📜

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details. 📝

## Ready to Explore? 💥🚀

Try it now: [abirthetech.serv00.net/yt.php?query=tum+hi+ho](https://abirthetech.serv00.net/yt.php?query=tum+hi+ho) 🎶  
Host your own: Grab `yt.php` from [GitHub](https://github.com/TheSmartDev/YouTube-API) and unleash the power of YouTube data! ✨  
Questions? Reach out to **@ISmartDevs** or open an issue on GitHub. 👀

**YouTube API: Created by Abir Arafat Chawdhuryr!** 💻🌟
