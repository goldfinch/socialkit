
# 🦅 Social Feed, Facebook, Instagram API for Silverstripe

[![Silverstripe Version](https://img.shields.io/badge/Silverstripe-5.1-005ae1.svg?labelColor=white&logoColor=ffffff&logo=data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHZpZXdCb3g9IjAgMCAxMDEuMDkxIDU4LjU1NSIgZmlsbD0iIzAwNWFlMSIgeG1sbnM6dj0iaHR0cHM6Ly92ZWN0YS5pby9uYW5vIj48cGF0aCBkPSJNNTAuMDE1IDUuODU4bC0yMS4yODMgMTQuOWE2LjUgNi41IDAgMCAwIDcuNDQ4IDEwLjY1NGwyMS4yODMtMTQuOWM4LjgxMy02LjE3IDIwLjk2LTQuMDI4IDI3LjEzIDQuNzg2czQuMDI4IDIwLjk2LTQuNzg1IDI3LjEzbC02LjY5MSA0LjY3NmM1LjU0MiA5LjQxOCAxOC4wNzggNS40NTUgMjMuNzczLTQuNjU0QTMyLjQ3IDMyLjQ3IDAgMCAwIDUwLjAxNSA1Ljg2MnptMS4wNTggNDYuODI3bDIxLjI4NC0xNC45YTYuNSA2LjUgMCAxIDAtNy40NDktMTAuNjUzTDQzLjYyMyA0Mi4wMjhjLTguODEzIDYuMTctMjAuOTU5IDQuMDI5LTI3LjEyOS00Ljc4NHMtNC4wMjktMjAuOTU5IDQuNzg0LTI3LjEyOWw2LjY5MS00LjY3NkMyMi40My0zLjk3NiA5Ljg5NC0uMDEzIDQuMTk4IDEwLjA5NmEzMi40NyAzMi40NyAwIDAgMCA0Ni44NzUgNDIuNTkyeiIvPjwvc3ZnPg==)](https://packagist.org/packages/spatie/schema-org)
[![Package Version](https://img.shields.io/packagist/v/goldfinch/social-media.svg?labelColor=333&color=F8C630&label=Version)](https://packagist.org/packages/spatie/schema-org)
[![Total Downloads](https://img.shields.io/packagist/dt/goldfinch/social-media.svg?labelColor=333&color=F8C630&label=Downloads)](https://packagist.org/packages/spatie/schema-org)
[![License](https://img.shields.io/packagist/l/goldfinch/social-media.svg?labelColor=333&color=F8C630&label=License)](https://packagist.org/packages/spatie/schema-org) 

<p><img width="100" src="https://raw.githubusercontent.com/goldfinch/social-media/main/meta.svg" alt="Meta"></p>

Social media Meta Integration for Silverstripe. Fetch and display Facebook/Instagram posts as a feed on your website. Easy to customize.

## Install

```bash
composer require goldfinch/social-media
```

#### 1. Create Meta App

[developers.facebook.com/apps/creation](https://developers.facebook.com/apps/creation/)

#### 2. Generate encryption key

All sensitive data that comes from Meta (ID,secret,tokens) are being encrypted in the database. Therefore we need a key. You can generate it using [**Taz**](https://github.com/goldfinch/taz) module by runing CLI command:
```bash
php taz generate:encryption-key
```

or dumping helper function
```php
LeKoala\Encrypt\EncryptHelper::generateKey()
```

#### 3. Save the key in `.env`

```bash
ENCRYPTION_KEY={mykey}
```


### Set up a Facebook Feed



### Set up an Instagram Feed

- Open **Social media** admin module that comes with this package `/admin/social-media` and navigate to *Settings > API*
- Enable *Instagram API* (checkbox)
- Set up the following fields:

  1) **App Secret**
  
      Go to [developers.facebook.com/apps/__MYAPPID__/instagram-basic-display/basic-display/](https://developers.facebook.com/apps/__MYAPPID__/instagram-basic-display/basic-display/)
      
      Get *Instagram App Secret*

  2) **Long-Lived Access Token**
      
      Go to [developers.facebook.com/apps/__MYAPPID__/instagram-basic-display/basic-display/](https://developers.facebook.com/apps/__MYAPPID__/instagram-basic-display/basic-display/)

      Get *Get token (User Token Generator) - Add or Remove Instagram Testers*

  3) **Fields**: [developers.facebook.com/docs/instagram-basic-display-api/reference/media/#fields](https://developers.facebook.com/docs/instagram-basic-display-api/reference/media/#fields)

      See [all fields](https://github.com/goldfinch/social-media?tab=readme-ov-file#useful-data) that you can copy and paste here

  4) **Limit**:
    
      Set post limit (for sync), `10`

- Make sure to **Save** it all

All set to go 🎉

Run task by clicking the **Sync** button on the same page or jump on `/dev/tasks/SocialMediaSync`

## Cron tasks

You might want to set up cron tasks for automations

```bash
/dev/tasks/SocialMediaRefresh # refresh token once in 4 weeks
/dev/tasks/SocialMediaSync # once in hour (or as you wish)
```

## Usage

```html
$SocialFeed

$SocialFeed.FacebookFeed(10)
$SocialFeed.FacebookPosts(10)

$SocialFeed.InstagramFeed(10)
$SocialFeed.InstagramPosts(10)
```

## Elemental Block

## Templates and modifications

## Useful data

### Instagram fields

```
caption,id,is_shared_to_feed, media_type,media_url,permalink,thumbnail_url,timestamp,username,children
```

### Facebook fields

```
id,actions,admin_creator,allowed_advertising_objects,application,attachments,backdated_time,call_to_action,can_reply_privately,child_attachments,created_time,feed_targeting,from,full_picture,icon,instagram_eligibility,is_eligible_for_promotion,is_expired,is_hidden,is_instagram_eligible,is_popular,is_published,is_spherical,message,message_tags,parent_id,permalink_url,place,privacy,promotable_id,properties,sheduled_publish_time,shares,status_type,story,story_tags,subscribed,targeting,to,updated_time,video_buying_eligibility,likes.summary(total_count),comments.summary(total_count),reactions.summary(total_count)
```

## License

The MIT License (MIT)
