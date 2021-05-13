DROP DATABASE IF EXISTS academydb;

CREATE DATABASE academydb;

USE academydb;

CREATE TABLE IF NOT EXISTS `users` (
	  `userid` INT NOT NULL AUTO_INCREMENT,
	  `username` VARCHAR(45) NOT NULL,
	  `password` VARCHAR(45) NOT NULL,
	  PRIMARY KEY (`userid`),
	  UNIQUE INDEX `username_UNIQUE` (`username` ASC));

CREATE TABLE IF NOT EXISTS `courses` (
  `courseid` INT NOT NULL AUTO_INCREMENT,
  `coursename` VARCHAR(300) NOT NULL,
  `description` TEXT,
  PRIMARY KEY (`courseid`));

CREATE TABLE IF NOT EXISTS `users_has_courses` (
  `users_userid` INT NOT NULL,
  `courses_courseid` INT NOT NULL,
  PRIMARY KEY (`users_userid`, `courses_courseid`),
  INDEX `fk_users_has_courses_courses1_idx` (`courses_courseid` ASC),
  INDEX `fk_users_has_courses_users_idx` (`users_userid` ASC),
  CONSTRAINT `fk_users_has_courses_users`
    FOREIGN KEY (`users_userid`)
    REFERENCES `users` (`userid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION,
  CONSTRAINT `fk_users_has_courses_courses1`
    FOREIGN KEY (`courses_courseid`)
    REFERENCES `courses` (`courseid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);

CREATE TABLE IF NOT EXISTS `units` (
  `unitid` INT NOT NULL AUTO_INCREMENT,
  `unitname` VARCHAR(200) NOT NULL,
  `courses_courseid` INT NOT NULL,
  `content` TEXT NULL,
  `quiz` TEXT NULL,
  PRIMARY KEY (`unitid`, `courses_courseid`),
  INDEX `fk_units_courses1_idx` (`courses_courseid` ASC),
  CONSTRAINT `fk_units_courses1`
    FOREIGN KEY (`courses_courseid`)
    REFERENCES `courses` (`courseid`)
    ON DELETE NO ACTION
    ON UPDATE NO ACTION);
INSERT INTO `courses`
(`coursename`, `description`)
VALUES
('Introduction to Web Development',
'This course is designed to start you on a path toward future studies in web development and design, no matter how little experience or technical knowledge you currently have.By the end of this course you’ll be able to describe the structure and functionality of the world wide web, create dynamic web pages using a combination of HTML, CSS, and JavaScript.'), 
('Introduction to Hausa Language', 
 'Hausa is a Chadic language spoken by the Hausa people, mainly within the territories of Niger and the northern half of Nigeria, and with significant minorities in Chad, Ghana, and Cameroon. In this course you would learn the basics of Hausa.');

INSERT INTO `units`
(`unitname`,
`courses_courseid`, `content`, `quiz`)
VALUES
('Unit 1 - Web, HTML5 and CSS', 
 '1', ' 
  {data}A bit is the smallest data item in a computer; it can have the value of 0 or 1.{/data}
  {data}The internet was made posibble by a gloabal convergence of computing and communication technologies.{/data}
  {data}The Advanced Research Projects Agency Network (ARPANET) was the basis for the internet.{/data}
  {data}One of the primary goals for ARPANET was to allow multiple users to send and receive information simultaneously over the same communications paths {/data}
  {data}Packet switching is a technique in which digital data is sent in small bundles called packets, which contain address,error-control and the sequenceing information .{/data}
  {data}TLS means Transport Layer Security (TCP){/data}
  {data}In October 1994, the World Wide Web Consortium (W3C) organization was founded.{/data}
  {data}The two most common HTTP request types (also known as request methods) are get and post.{/data}
  {data}Browsers often cache (save on disk) recently viewed web pages for quick reloading.{/data}
  {data}In HTML5 delimits most elements with a start and end tag. A start tag consists of the element name in angle brackets and the end tag consists of the element name preceded by a forward slash in angle brackets{/data}
  {data}Packet switching is a technique in which digital data is sent in small bundles called packets, which contain address,error-control and the sequenceing information. {/data}
  {data}CSS stands for Cascading Style Sheets. It is a language for decribing the Style of Webpages, including colors, fonts, adaption to different screen types and many other things.CSS3 is a modernized version of CSS. CSS code can be validated using jigsaw.w3.org/css-validator/ .{/data}
  {data}In October 1994, the World Wide Web Consortium (W3C) organization was founded.{/data}
  {data}Usaully elements in html5 are positioned in the order that they appear in the html5 document . However positioning allows us to specificy the exact place we want the element to be displayed.{/data}
  {data}Color names and hexadecimal codes may be used as the color property value. You can also find a complete list of HTML standard and extended colors at www.w3.org/TR/css3-color/ or https://www.w3schools.com/colors/colors_picker.asp{/data}
  {data}Another way of embedding CSS in a webpage is by embedding it in the head section of the html5 document. This method is mostly used when you have a general theme for your website but you want to alter a specific page a bit.{/data}
  {data}Color names and hexadecimal codes may be used as the color property value. You can also find a complete list of HTML standard and extended colors at www.w3.org/TR/css3-color/ or https://www.w3schools.com/colors/colors_picker.asp{/data}
  {data}There are two types of lists in html5: Ordered list and Unordered list{/data}
  {data}For more information check out: https://www.w3schools.com/html/default.asp{/data}
  ',
  '
  {question}
    {ask}"Every year or two the capacity of a commputers have doubled". Who was the first person to publicly state this fact ?{/ask}
    {choiceA}A: Gordon Moore{/choiceA}
    {choiceB}B: Gordon Borris{/choiceB}
    {choiceC}C: Borris Moore{/choiceC}
    {answer}A{/answer}
  {/question}
  {question}
    {ask}The set of rules for the internet and APRANET is called ? {/ask}
    {choiceA}A: RLL{/choiceA}
    {choiceB}B: TCP/IP{/choiceB}
    {choiceC}C: TMR/IP{/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}TLS stands for ?{/ask}
    {choiceA}A: Telecommunication Layer Security{/choiceA}
    {choiceB}B: Transmission Layer Security{/choiceB}
    {choiceC}C: Transport Layer Security{/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}Which of the following is not a HTTP request method ?{/ask}
    {choiceA}A: PATCH{/choiceA}
    {choiceB}B: REMOVE{/choiceB}
    {choiceC}C: POST{/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}Which of these is the best way to put a link to another webpage on a page ?{/ask}
    {choiceA}A: &#60; link &#62; &quot; url &quot;  &#60; / link  &#62;{/choiceA}
    {choiceB}B: &#60; link  src= &quot; url &quot; &#62; link text   &#60; / link  &#62;{/choiceB}
    {choiceC}C: &#60; a  href= &quot; url &quot; &#62; link text   &#60; / a  &#62;{/choiceC}
    {answer}C{/answer}
  {/question}
 {question}
    {ask}To use an image as a link, put the ___________ tag inside the ____________ tag ?{/ask}
    {choiceA}A: &#60; img &#62; ,  &#60; href &#62;{/choiceA}
    {choiceB}B: &#60; img &#62; ,   &#60; a  &#62;{/choiceB}
    {choiceC}C: &#60; a   &#62; ,   &#60; img &#62;{/choiceC}
    {answer}B{/answer}
  {/question}
 {question}
    {ask}There are two type of lists in html5, what are they ?{/ask}
    {choiceA}A: ordered and unordered{/choiceA}
    {choiceB}B: numbered and unnumbered{/choiceB}
    {choiceC}C: simple and complex{/choiceC}
    {answer}A{/answer}
  {/question}
   {question}
    {ask}In CSS, background attachment __________________{/ask}
    {choiceA}A: Specifies an image to use as the background of an element{/choiceA}
    {choiceB}B: Specifies whether the background image should scroll or be fixed{/choiceB}
    {choiceC}C: Specifies the starting point of the background image{/choiceC}
    {answer}B{/answer}
  {/question}
    {question}
    {ask}What is the hex code for black{/ask}
    {choiceA}A: #000000{/choiceA}
    {choiceB}B: #ffffff{/choiceB}
    {choiceC}C:rgb(f,f,f) {/choiceC}
    {answer}A{/answer}
  {/question}
    {question}
    {ask}What does the hr tag stand for ? {/ask}
    {choiceA}A: horizontal ruler{/choiceA}
    {choiceB}B: horizontal rule{/choiceB}
    {choiceC}C: heights ruler{/choiceC}
    {answer}B{/answer}
  {/question}
 '
), 
('Unit 2 - JavaScript', 
 '1',
 '
  {data}JavaScript is a scripting language that is used to enhance the functionality and appearance of web pages{/data}
  {data}The script tag indicates to the browser that the text which follows is javascript.{/data}
  {data}Every satatement in JavaScript should end with a semi-colon.</{/data}
  {data}JavaScript is case-sensitive.{/data}
  {data}Browsers window object uses method alert to display an alert dialog. E.g window.alert("Some text"). The window.alert() method can be written without the window prefix. {/data}
  {data}A variable name can consist of letters, digits, underscores and the dollar sign.{/data}
  {data}A variable name cannot begin with a digit and cannot be a JavaScript resrved word.{/data}
  {data}ParseInt is a function that converts a string to an interger{/data}
  {data}Variable names correspond to locations in the computers memory{/data}
  {data}IJavaScript does not require variables to have a tyoe before they can be used in a script{/data}
  {data}All scripts can be written in term of three control Statements: sequence, selection and repition {/data}
  {data}A sequence is a set of instructions executed one after the other{/data}
  {data}A selection statement is a conditional statement. Javascript has 3 selection structures:if statement (single selection),if..else statement (double selection) and switch statement (multiple selection){/data}
  {data}This allows us to repeat a certain statement for a certain number of times whilst the condition is true. Javascript has 4 repition statements:while, do...while, for and for...in {/data}
  {data}Javascript just like most other programming languages come with reserved keywords, some popular keywords in Javascript include, break, catch, else, try, true, new,and so much more .{/data}
  {data}JavaScript also comes with a lot of Global functions. Here are some of the popular ones: parseInt(),parseFloat(),Number(), String(), isFinite(), isNAN(){/data}
  {data}Arrays are data structures consisting of related items. They can also be defined as a group of memory locations of the same name and most times the same type. Arrays in javaScript are dynamic entities as they can change size after they are created.{/data}
  {data}Did you know that Javascript does not check the number of arguemnets or types of arguements passed to a function ? Its possible to pass any number of values to a function{/data}
  {data}For more information check out: https://www.javascript.com/ {/data}
  ',
 '{question}
    {ask}The _______________ tag indicates to the browser that the text which follows is in JavaScript.{/ask}
    {choiceA}A: js{/choiceA}
    {choiceB}B: javascript {/choiceB}
    {choiceC}C: script{/choiceC}
    {answer}C{/answer}
  {/question}
  {question}
    {ask}Which of these ways is not the right way to write an alert in javascript ?{/ask}
    {choiceA}A: alert("Hello World"){/choiceA}
    {choiceB}B: window.alert("Be careful !"){/choiceB}
    {choiceC}C: window.error("404"){/choiceC}
    {answer}C{/answer}
  {/question}
  {question}
    {ask}A variable in JavaScript cannot begin with a ____________{/ask}
    {choiceA}A: digit{/choiceA}
    {choiceB}B: underscore{/choiceB}
    {choiceC}C: dollarsign{/choiceC}
    {answer}A{/answer}
  {/question}
  {question}
    {ask}Which of the following reserved words have been removed from the ECMAScript 5/6 standard ?{/ask}
    {choiceA}A: while{/choiceA}
    {choiceB}B: boolean{/choiceB}
    {choiceC}C: try{/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}What does the javascript in-built function Number() do?{/ask}
    {choiceA}A: Parses a string and returns an interger{/choiceA}
    {choiceB}B: Parses a string and returns a floating point number{/choiceB}
    {choiceC}C: Converts an objects value to a number{/choiceC}
    {answer}C{/answer}
  {/question}
 {question}
    {ask}var prepositions = ["above", "but", "come", "down", "except", "from", "into", "like", "near", "on"].  What is preposition[5] ?{/ask}
    {choiceA}A: "except"{/choiceA}
    {choiceB}B: "from"{/choiceB}
    {choiceC}C: "into"{/choiceC}
    {answer}B{/answer}
  {/question}
 {question}
    {ask}Which of the following functions rounds x to the largest interger not greater than x?{/ask}
    {choiceA}A: ceil(x){/choiceA}
    {choiceB}B: round(x){/choiceB}
    {choiceC}C: floor(x){/choiceC}
    {answer}C{/answer}
  {/question}
   {question}
    {ask}Which of these functions splits the source string into an array of strings ?{/ask}
    {choiceA}A: split(string){/choiceA}
    {choiceB}B: slice(start, end){/choiceB}
    {choiceC}C: substring(start, end){/choiceC}
    {answer}A{/answer}
  {/question}
    {question}
    {ask}Which of these functions would be able to produce the output 28 ?{/ask}
    {choiceA}A: getMonth(){/choiceA}
    {choiceB}B: getDay(){/choiceB}
    {choiceC}C: getDate() {/choiceC}
    {answer}C{/answer}
  {/question}
    {question}
    {ask}Which of these is not a representation of boolean false ? {/ask}
    {choiceA}A: "false"{/choiceA}
    {choiceB}B: false{/choiceB}
    {choiceC}C: ""{/choiceC}
    {answer}A{/answer}
  {/question}'), 
('Unit 3 - XML and Ajax', 
 '1',
 '
  {data}XML stands for eXtensible Markup Language.{/data}
  {data}XML is a portable, widely supported open technology for data storage and exchange{/data}
  {data}It permits document authors to create markup fot virtually any type of information.{/data}
  {data}It  described daata in a way that human beings can understand and computers can process{/data}
  {data} An xml parser is responsible for identifying components in data structure for manipulation.{/data}
  {data}Unlike html, xml does not have predefined tags so the author most define both the tags and the structure{/data}
  {data}XML documents are formed as element trees.{/data}
  {data}The tree starts from the root element and branches to the children.{/data}
  {data}The terms used  to discribe this relationship are parent, child , siblings.{/data}
  {data}XML documents must contain one general root element that is the parent of all other elements{/data}
  {data}XML tags are case-sensitive.{/data}
  {data}XML elements must be properly nested{/data}
  {data}XML attribute values must always be quoted{/data}
  {dataAJAX stands for Asynchronous JavaScript and XML.{/data}
  {data}AJAX applications seperate client-side user interaction and server communication, and run them in parrallel, making the server communication and the run them in parrallel, making delays of server side processing more transparent to the user.{/data}
  {data}A classic HTML registration form sends all of the data to be validated to the server when the user clicks the register button but Ajax-enabled forms are more interactive entries are validated individually, dynamically as the user enters data into the fields.{/data}
  {data}For more information check out: https://www.w3schools.com/xml/ajax_xmlfile.asp {/data}
  ',
 '{question}
    {ask}An xml _____________ is responsible for identifying components of XML documents and storing those components in a data structure{/ask}
    {choiceA}A: reader{/choiceA}
    {choiceB}B: parser {/choiceB}
    {choiceC}C: manipulator{/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}XML stands for ___________{/ask}
    {choiceA}A: eXpressible Markup Language{/choiceA}
    {choiceB}B: eXtensible Markup Language{/choiceB}
    {choiceC}C: eXtensive Markup Language{/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}Which of these is not a rule in XML{/ask}
    {choiceA}A: XML elements must be properly nested{/choiceA}
    {choiceB}B: All xml documents must have a prolog{/choiceB}
    {choiceC}C: All xml attributes values must be quoted {/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask} What is the main type of stylesheet used for xml?{/ask}
    {choiceA}A: css  {/choiceA}
    {choiceB}B: xsl {/choiceB}
    {choiceC}C: text {/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}Which of these is the correct way to write a comment in xml{/ask}
    {choiceA}A:  &lt; !-- This -- is -- a -- comment --  &gt; {/choiceA}
    {choiceB}B: &lt; !-- This is a comment --&gt; {/choiceB}
    {choiceC}C:  &lt; !-- This is a comment &gt; {/choiceC}
    {answer}B{/answer}
  {/question}
    {question}
    {ask}What makes ajax-enabled forms better than regular html forms{/ask}
    {choiceA}A:They are prettier{/choiceA}
    {choiceB}B: They accept more fields{/choiceB}
    {choiceC}C: They are more interactive.{/choiceC}
    {answer}C{/answer}
  {/question}
    {question}
    {ask}What does the term AJAX stand for ? {/ask}
    {choiceA}A: Active JavaScript and XML {/choiceA}
    {choiceB}B: Anachronic JavaScript and XML{/choiceB}
    {choiceC}C: Asynchronous JavaScript and XML {/choiceC}
    {answer}C{/answer}
  {/question}'), 
('Unit 1 - Greetings', 
 '2',
  '{notes}
  {data}Sannu means Hello{/data}
  {data}Ina Kwana means Good Morning{/data}
  {data}Barka da yamma means Good Evening{/data}
  {data}Yaya ranar ku means how was your day{/data}
  {/notes}',
 '{questions}
  {question}
    {ask}What is Good Evening in hausa ?{/ask}
    {choiceA}A: Ina kwana {/choiceA}
    {choiceB}B: Barka da yamma {/choiceB}
    {choiceC}C: Yaya ranar ku{/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}What is Hello in hausa ?{/ask}
    {choiceA}A: Ina kwana {/choiceA}
    {choiceB}B: Sannu {/choiceB}
    {choiceC}C: Barka da yamma {/choiceC}
    {answer}B{/answer}
  {/question}'), 
('Unit 2 - Numbers', '2',
 '
  {data}1: ɗaya {/data}
  {data}2:biyu {/data}
  {data}3: uku{/data}
  {data}4:huɗu{/data}
  {data}5:biyar {/data}
  {data}6:shida{/data}
  {data}7:bakwai{/data}
  {data}8:takwas{/data}
  {data}9:tara{/data}
  {data}10:goma{/data}
  {data}11:(goma) sha ɗaya{/data}
  {data}12:(goma) sha biyu{/data}
  {data}20:ashirin{/data}
  {data}30:talatin{/data}
  {data}40:arba’in{/data}
  {data}50:hamsin{/data}
  {data}60:sittin{/data}
  {data}70:saba’in{/data}
  {data}80:tamanin{/data}
  {data}90:tasani{/data}
  {data}100:ɗari{/data}
  {data}1000:dubu{/data}
  ',
 '{question}
    {ask}What is 13 in hausa?{/ask}
    {choiceA}A: talatin {/choiceA}
    {choiceB}B: (goma) sha uku {/choiceB}
    {choiceC}C: tamanin {/choiceC}
    {answer}B{/answer}
  {/question}
  {question}
    {ask}What is 68 in hausa ?{/ask}
    {choiceA}A: sittin da takwas {/choiceA}
    {choiceB}B: sittin sha takwas {/choiceB}
    {choiceC}C: shida da takwas {/choiceC}
    {answer}A{/answer}
  {/question}');
