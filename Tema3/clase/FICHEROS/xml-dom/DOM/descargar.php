<?
    header("Content-Type: txt/xml");
    header("Content-Disposition: attachment: filename=instrumentos.xml");
    readfile("./intrumentos.xml");
    exit;
