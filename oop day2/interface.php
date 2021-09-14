<?php

interface sara {
    function createData ();
    function readData ();
    function updateData();
    function deleteData ();
    // CRUD Operations
}


interface data {
    function importData ();
    function exportData ();
}


class product implements sara,data {
    function createData () {
        
    }
    function readData () {
        
    }
    function updateData() {
        
    }
    function deleteData () {
        
    }

    function importData () {

    }
    function exportData () {

    }
}
// echo product::x;

class category implements sara,data  { 
    function createData () {

    }
    function readData () {
        
    }
    function updateData() {
        
    }
    function deleteData () {
        
    }

    function importData () {

    }
    function exportData () {

    }
}


class city  implements sara  {
    function createData () {

    }
    function readData () {
        
    }
    function updateData() {
        
    }
    function deleteData () {
        
    }
}