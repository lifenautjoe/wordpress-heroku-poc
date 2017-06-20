# wordpress-heroku-poc

- [wordpress-heroku-poc](#wordpress-heroku-poc)
  * [What](#what)
  * [Why](#why)
  * [Included plugins](#included-plugins)
    + [amazon-s3-and-cloudfront](#amazon-s3-and-cloudfront)
    + [woocommerce](#woocommerce)
  * [Running](#running)
  * [Configuring](#configuring)
  * [Conclusion](#conclusion)
  * [Alternatives](#alternatives)
  * [Questions or thanks](#questions-or-thanks)

## What

A proof of concept for getting a typical freelanced Wordpress site on the [heroku](www.heroku.com) platform.

## Why

I'm currently in the process of funding a software company and website development being a major part of it I want to ensure picking the best platform for our customers and developers. Having tried Amazon ElasticBeanstalk, it's Heroku's turn.

## Included plugins

### amazon-s3-and-cloudfront

**Why?** 

Herokus storage is ephemeral. As in everytime you do a new deploy the files that you deploy get placed on a brand new "dyno". Wordpress stores media content on the file system. This plugin uploads the media to Amazons S3 service (The cloud) instead and links to them(Most of the time), meaning that if our wp-content directory is wiped out after a deploy, our media content will still be available.

### woocommerce

**Why?** 

Althought most sites won't ever require an E-Commerce solution, some of them will and we must be confident that we will be able to deliver with our chosen platform.  

## Running

Install the [Heroku Toolbelt](https://toolbelt.heroku.com/).

```sh
$ git clone git@github.com:lifenautjoe/wordpress-heroku-poc.git # or clone your own fork
$ cd wordpress-heroku-poc
$ heroku create
$ git push heroku master
```
## Configuring

**Local**
Copy the .env.sample as .env with your configuration.

**Heroku**

Open the Heroku application dashboard.
```sh
$ heroku open
```
Add all of the .env.sample variables into your heroku config variables with your configuration.

## Conclusion

TLDR; **Don't do it.**

Wordpress and it's massive community of developers rely heavily in the file system for storing media, saving configuration files, caching and more. Hosting it in an ephemeral file system platform such as Heroku or Amazon ElasticBeanstalk is jumping into a sea of uncertainties. And yes, while there are plugins and **developers** that claim to have done it, it's either by purchashing costly plugins and subscriptions or using open source software that might cease to be mantained tomorrow, both solutions **will NEVER work fully**. There's thousands of plugins out there and they all rely on WordPress being hosted on a persistent file storage, there are no guarantees your site won't break down after installing a new plugin or restarting your machine. 

So what really happened? Well, with a small number of plugins compared to a production wordpress site, the site worked but was VERY unstable. A restart of the server deleted configuration files created by wordpress itself which resulted in 404 of pages as well as removed the possibility of cropping previously uploaded images and a dozen tiny things which altogether are a big no. On the WooCommerce part, the amazon-s3-and-cloudfront requires a "premium" subscription of around 50 USD to even try to get it to work so it was an inmediate no from me. Not because I don't have 50 dollars to spare on such a thing but because I refuse to pay for something I'm not confident will work out.

So, to conclude, if you're building a site for yourself and are considering Wordpress and Heroku, save yourself the trouble. If you're building a site for someone else, be professional and build it in the the best platform available for it, Heroku clearly not being it.

## Alternatives

I'm currently doing a POC with [DigitalOcean](www.digitalocean.com) and will write about it once I have a veredict. Seems pretty good so far!


## Questions or thanks

If I still haven't convinced you and want to ask some more questions or if I saved you hours of frustation and would like to say thanks, let me know! Drop me a tweet at [@lifenautjoe](https://twitter.com/lifenautjoe) or in my [Instagram account](https://instagram.com/lifenautjoe).

I'm also setting up a blog so those are also the best channels to stay informed about it!


