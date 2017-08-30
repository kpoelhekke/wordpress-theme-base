# Vincit WordPress theme base

This theme is as barebones as starter themes get. It ~~has everything~~ will have everything preconfigured, but boilerplate is kept to a minimum.

## Features
- [ ] ???
- [x] Built with Webpack 3
  - [x] ES6+
  - [x] ESLint
  - [x] Stylus
  - [x] Sourcemaps
  - [x] **CSS Hot Module Replacement** (HMR)
  - [x] **JS Hot Module Replacement** (HMR)
  - [x] Automatic image optimization using imagemin
  - [x] Nyancat progress bar
  - [x] Enforces case sensitive paths
- [ ] PHPCS

## Usage
Clone the theme or install it with the installer that ships with [Vincit/wordpress](https://github.com/Vincit/wordpress). Composer is also an option.
```
git clone git@github.com:Vincit/wordpress-theme-base.git themename

# OR (with first vagrant up if using Vincit/wordpress)
# Runs automatically. Answer yes to the question when prompted.

# OR (Vincit/wordpress installer)
./install # Follow the instructions

# OR (composer)
composer require vincit/wordpress-theme-base # append dev-master to get the latest version (potentially unstable)
```

Install dependencies:
```
npm install
```

Start watching for changes:
```
npm run watch # or npm run start, but webpack-dashboard is buggy at the moment
```

Find & replace at least these strings:
`wordpress-theme-base` => ???
`WordPress theme base` => ???

## FAQ
### What's with the folder structure?
- build/ contains build related things, such as Webpack config.
- dist/ contains the build itself. Never committed to version control.
- inc/ contains server side includes. Basically if you would put it in functions.php, put it here.
- src/ contains client side source files, including JavaScript, Stylus and images.
  - js/ contains JavaScript files.
  - styl/ contains Stylus files.
  - img/ contains images, including SVGs.
  - Files inside src/ directly will be used to build files: `client.styl` => `client.css` and so on.

### WTF, why are you importing a `.styl` file inside JavaScript?
Ask Webpack. Get over it. Basically Webpack doesn't know about them otherwise.

### I installed all the dependencies and ran npm run watch, but when I try to access http://localhost:8080 I get the following error: Error occured while trying to proxy to: localhost:8080/
You don't have WordPress installed at https://wordpress.local, which is the default address. Change the proxyURL value in package.json and try again.

### You promised us HMR, but it doesn't work?!!
See above. HMR requires publicPath value to work. This theme defaults to http://localhost:8080/wp-content/themes/wordpress-theme-base/dist/, if you installed the theme in a directory with another name you obviously need to change it.
Change the value in package.json.

### I did the above but HMR still doesn't work?
Git gud. HMR requires you to write your code accordingly, example:
- [Module](https://github.com/Vincit/wordpress-theme-base/blob/master/src/js/components/clock.js)
- [client.js](https://github.com/Vincit/wordpress-theme-base/blob/master/src/client.js)

Consult Webpack documentation if necessary.

### I get a white screen or Fatal error: Uncaught Exception: Enqueued file must be a css or js file
Build the theme after installing it. Run `npm install`.