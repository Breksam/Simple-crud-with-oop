<?php
// get tittle 
function getTitle(){
    global $pageTitle;
		if (isset($pageTitle)) {

			echo $pageTitle;

		} else {

			echo 'Default';

		}
}
function getHeading(){
    global $pageHeading;
		if (isset($pageHeading)) {

			echo $pageHeading;

		} else {
			echo 'Default';
		}
}
