# Task 3 Robot With Chat Bot

## Contents
*  *dataBase.sql*: contain the database with two tables for arm and base.
*  *Gui.php*; The front end control of the robot .
*  *angles.php*: A file that retieves arm angles values from database.
*  *direction.php: A file that retrieves base direction and movement status from database. 
*  *style.css*: The main style for the GUI.
*  *script.js*: The main script for the GUI.
*  *skill-conversation.json*: A file contain entities, intents and dialog nodes related to chat bot.

## How To Use our GUI
### Arm
It contains **6** bars each one of them will  adjust a single engin's angle , these bars may differ in upper and lower bounds.
After adjusting angles you can click on either **save** or **operate** buttons, save button will save the settings you have chosen to database, and operate button will do the same including applying these settings to the robot arm engins.

### Base
It consist of **5** buttons [forward, left, right, stop backward], when a button is clicked base of the robot will be moved to the direction of that button.
Down at the south will display movement status.

## How to fetch robot data
* **Arm data** : all you need to do is to access the *angles.php* which contains the data.
* **Base data** : all you need to do is to access the *direction.php* which contains the data. 

## How to interact with the chat bot
Interacting with chat bot will be the most simple thisng you will do in your life. **Just ask anything related to the robot and how to control it** , its arm and its base.
If you ran to any misunderstanding issue with the bot try to rephrase what you mean and try to use synonyms if possible.

## Some More Information About The Chat Bot
I tried to provide the bot as much of intents and entities as possible, in fact I did my best to train it about misleading questions and odd synonyms.
The chat bot is positioned at the bottom right of the GUI in *Gui.php*. 

[chat bot screenshot](https://github.com/sarajAljohani/Task-3-Robot-With-Chat-Bot/blob/main/bot.png)
