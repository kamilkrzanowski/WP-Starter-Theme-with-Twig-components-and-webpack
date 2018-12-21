# WP-Starter-Theme-with-Twig-components-and-webpack
This theme is created as quick start to make new themes from scratch. You can build big themes with many separates twig components, using BEM scss writing method. Included webpack makes sure that all ES6 code and SCSS is compiled to browser-friendly version with autoprefixing and more. 

Also, Jquery, Slickslider and font-awesome is in dependencies by default. If you dont need them, just remove them from `package.json` :)

It requires your WordPress to have `Timber` plugin installed !!! 

Besides that, you can use jQuery in your JS files just by importing it at the begining of the file with: 
``` import $ from 'jquery' ```


First, install all packages by entering:

```npm install```

Then

``npm run dev``

to start webpack watch. Have fun 
