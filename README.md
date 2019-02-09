# ip3
GCU - Integrated Project 3 

//--------------------------------------------------------------

Sublime Text Editor - It's notepad++ on steroids, amazing colours, auto complete, setup for web and a bunch of other languages - not a full blown IDE like for Java but it's perfect for web development, trust me you're going to want it.

https://www.sublimetext.com/

Click download for windows and install it - it's free but has a pop up every now and then to buy it but it's really worth that minor hassle.

//--------------------------------------------------------------

Wamp64 - it lets you run websites that you're developing from your browser. You do need it for PHP etc.

//wamp direct link - this is the official proper version so safe to install.
https://sourceforge.net/projects/wampserver/files/WampServer%203/WampServer%203.0.0/wampserver3.1.7_x64.exe/download

Go through the exe install, leave all of the options as default (IMPORTANT!)

When you get the popup about another browser click yes
Navigate to your normal browser, for chrome default this is:
C:\Program Files (x86)\Google\Chrome\Application\chrome.exe

Next popup is for changing the default editor.
Set this to sublime text editor:
C:\Program Files\Sublime Text 3\sublime_text.exe

(There might be a new dialogue window opens about now about setting up MySQL - I never got it when I tested a fresh install but send Mark a message if you get it)

Ok, now for convience open the folder:
C:\wamp64
right click the www folder, and click copy. On your desktop rightclick and paste shortcut.
This creates a shortcut to the www folder which is where the websites you're developing are stored.

On your desktop double click the Wamp server shortcut and you should see a big W icon in your taskbar - that's wamp.
Left click the W - then click phpmyadmin, and by default the username is root and password is blank.
This is where we can install a mysql database etc, we'll probably be using that - to be decided I guess.

//--------------------------------------------------------------

Github Desktop

Katrina is attempting to use the console version - I prefer the application version - if you want to use the console version you're on your own, I have no experience using it and don't care to learn it.

https://desktop.github.com/
Obviously click the download for windows button, install it, run it.
You should be prompted to sign in, if not: file-> options-> sign in -> signin to your github account.

Ok, to setup; at the top left should be repository. Click it and then click add, then clone repository.

Read the full next bit before you proceed!!!!!!!!!!!!

A list of 'Your Repositories' will open - select the ip3 one, at the bottom where it says localpath - change that too: 
C:\wamp64\www\ip3 (if you didn't change the install location)
Make sure it isn't C:\wamp64\www\ip3\ip3 or something stupid.

then click clone
you now have the latest version of the website installed in your www folder.
Now that you also have wamp running - should be a green W in the toolbar, you can open the website in your browser.
In your browser type in: localhost/ip3 (and enter obviously)
tada!

Now when we work on the website - access it from the www shortcut on your desktop, whenever you make any changes to any of the files (including adding/deleting files) you can push the changes to github when you are finished, we can then sync our files with the files on github.

Branches work like this - if you're working on something big such as adding a new feature (kinda applys more to code development where shit breaks so easy) you can create a new branch (on github desktop it says current branch next to repository) - you can create a new branch and work on that branch and then merge it with the master once you're happy it's working properly and all that. I'll be honest though I don't have much experience using branches and it isn't going to be that helpful for a website really.

//--------------------------------------------------------------

Some other important things:

Go to the www shortcut, open ip3, right click index.php - "open with..."
Select the checkbox at the bottom, you may need to click more apps and scroll down but select sublime text (you may need to navigate to it: C:\Program Files\Sublime Text 3\sublime_text.exe)
That just sets your default text editor to sublime for php files, you'll need to do this several more times for .js files, .html files etc when we have them.

Another thing in sublime: file-> open folder...-> select C:\wamp64\www\ip3
This gives you the folders contents on the left and makes working on a website a lot easier as there's always a bunch of jumping back and forth.

//--------------------------------------------------------------

Using all of that shite together:

Open index.php, either by opening the file or by using the navigation on the left of sublime.
Add something, anything.
Save it. Check out localhost/ip3 and you'll see your changes.
Now if you look at github desktop - it'll show you the changes you made.
On the top is the files/changes and at the bottom left is the commit option (this is how you update the branch - by default the master branch)
You give it a name (make it an appropriate name) and give it a description, don't just write simple stuff here as we can use it later when writing the report, write what you did like; 
"updated index.php and added my changes to test it out"
Then you click commit to master.
Then you push to origin button - it's only when you push to origin that the online version is modified.

So now if you look at 
https://github.com/your_username_here!!!!!/ip3
You'll see that index.php was updated X seconds ago - we can then get the update.

Thats it :)