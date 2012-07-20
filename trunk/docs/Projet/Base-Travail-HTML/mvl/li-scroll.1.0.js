﻿@CHARSET "ISO-8859-1";

/* liScroll styles */

.tickercontainer { /* the outer div with the black border */
border: 1px solid #000;
background: #fff; 
width: 738px; 
height: 27px; 
margin: 0; 
padding: 0;
overflow: hidden; 
}
.tickercontainer .mask { /* that serves as a mask. so you get a sort of padding both left and right */
position: relative;
left: 10px;
top: 8px;
width: 718px;
overflow: hidden;
}
ul.newsticker { /* that's your list */
position: relative;
left: 750px;
font: bold 10px Verdana;
list-style-type: none;
margin: 0;
padding: 0;

}
ul.newsticker li {
float: left; /* important: display inline gives incorrect results when you check for elem's width */
margin: 0;
padding: 0;
background: #fff;
}
ul.newsticker a {
white-space: nowrap;
padding: 0;
color: #ff0000;
font: bold 10px Verdana;
margin: 0 50px 0 0;
} 
ul.newsticker span {
margin: 0 10px 0 0;
} 