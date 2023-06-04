## About Reddit Mod

I have a Niche Subreddit and think it would be useful for a GPT to reply to the questions users ask. It would be extremly useful to plug that into a dataset to get more accurate information.

I'd also like to see sentiment analysis to warn me of comments.

I'd also like to "tag" posts with a flare, if it is a Question, Informative Post, etc..

## Roadmap

# GPT Reply

-   [x] Install common Laravel Packages
-   [x] Socialite Login
-   [x] Socialite Reddit Login
-   [ ] User - Add Subreddit to "manage" to DB.
-   [ ] RSS Feed of Subreddit new threads to DB.
-   [ ] Test RSS->Reply Pipeline
-   [ ] User - Write a prompt to get replies.
-   [ ] Use prompt to get a reply to specific thread.
-   [ ] Use prompt to reply to a sepcific thread
-   [ ] Implement prompt response to pipeline
-   [ ] Add Filter to Pipeline (min likes, reply count before answering)
-   [ ] Add Self-Financing
-   [ ] Test on my subreddit
-   [ ] Release to paid to public.
-   [ ] Release source to public, with licenceing, etc..

# GPT Knowledge

-   [ ] Plan

# GPT Sentiment Comment (Thread/Comment)

-   [ ] Plan

# GPT Tag Posts

-   [ ] Plan

## Notes

-   https://github.com/ahosker/redditmod

# Reddit API

-   Into: https://www.reddit.com/wiki/api/
-   Guide https://github.com/reddit-archive/reddit/wiki/OAuth2
-   Entry Points https://www.reddit.com/dev/api
-   Entry Points by Scope - https://www.reddit.com/dev/api/oauth
-   Archived Docs - https://github.com/reddit-archive/reddit/wiki/API
-   Scopes - https://www.reddit.com/api/v1/scopes
-   PHP Example - https://github.com/reddit-archive/reddit/wiki/OAuth2-PHP-Example
-   Bot Ettiqute https://www.reddit.com/r/Bottiquette/wiki/bottiquette/

# Socialite

-   Socialite (reddit) Docs: https://socialiteproviders.com/Reddit/
