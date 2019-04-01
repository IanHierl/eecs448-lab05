# EECS 448 Lab 05

## Exercise 1: Setup Database

Create a MySQL database that has two tables:

1. Users
    1. _user\_id_
1. Posts
    1. _post\_id_
    1. _content_
    1. _author\_id_
  
_user\_id_ is a series of characters unique to each user

_post\_id_ is a unique integer value automatically assigned by the database

_content_ is a text field that must have the potential for more than 255 characters.

_author\_id_ is a reference to the _user\_id_ of the user who wrote the post

Files:
 * __None__

Tasks:
 - [x] Create Users table
 - [x] Create Posts table

----

## Exercise 2: Create User Interface

Create an HTML page with a form that allows a user to create a new record in the Users database.

Files:
 * CreateUser.html
 * CreateUser.php
 
Tasks:
  - [x] Write form page (CreateUser.html)
  - [x] Write processing page (CreateUser.php)

----

## Exercise 3: Create Posts Interface

Create an HTML page with a form that allows a user to enter their user name and submit a post. Backend page should return a message about the success of the post.

Files:
 * CreatePosts.html
 * CreatePosts.php

Tasks:
  - [x] Write frontend page (CreatePosts.html)
  - [x] Write backend page (CreatePosts.php)
  - [x] SQL Injection prevention
  - [x] Do not allow empty posts
  - [x] User must exist - handle MySQL error (Foreign Key Constraint)

----

## Exercise 4: Administrator Home

Series of links to other administrative pages.

Files:
 * AdminHome.html

Tasks:
  - [x] Link to ViewUsers.php
  - [x] Link to ViewUserPosts.html

----

## Exercise 5: View Users Page

A page that displays a table with all users.

Files:
 * ViewUsers.php

Tasks:
  - [ ] PHP generated table with user data.

----

## Exercise 6: View User Posts

A page that allows user to select from a list of users, which then will load a table of all the posts made by that user.

Files:
 * ViewUserPosts.php

Tasks:
  - [ ] Dropdown list selection form
  - [ ] Return table when user is selected

----

## Exercise 7: Delete Post

An administrative page that allows posts to be deleted. Posts are displayed in a table, each with a checkbox that represents whether or not to delete the post. All selected posts should be deleted and a confirmation page should display the ids of all deleted posts.

Files:
 * DeletePost.html
 * DeletePost.php

Tasks:
  - [ ] Post display table and form page
  - [ ] Backend MySQL code to delete posts
