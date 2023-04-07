
## About Project

The "project for productive families" sounds like a platform or marketplace for local families to sell their handmade crafts and food products. The goal of the project is likely to support these families by providing them with a platform to showcase and sell their products. This can help these families generate additional income and potentially grow their businesses.

used Laravel as back end technology 

## After Pull

To remove the "public" from the URL of a Laravel application, you can follow these steps:

Open the root directory of your Laravel project using a file manager or terminal.
Locate the .htaccess file in the root directory of your Laravel application. If it does not exist, create a new file with that name.
Edit the .htaccess file and add the following code to it:
<code>
RewriteEngine On
<br>
RewriteRule ^(.*)$ public/$1 [L]
</code>



Save the .htaccess file.
This code will redirect all requests to the public directory, effectively removing the public from the URL. Now you can access your Laravel application without including "public" in the URL.



## Don't forget create .env file after clone project


## License

All Project Created By <a href="https://www.facebook.com/7odan.0">Mahmoud Elnagar</a>
# Shop-for-local-industries
