<?php
    class mime_mail 
    {
      var $parts;
      var $to;
      var $from;
      var $headers;
      var $subject;
      var $body;
      function mime_mail($to,$from,$subject,$body)
      {
        $this->parts = array();
        $this->to =  "";
        $this->from =  "";
        $this->subject =  "";
        $this->body =  "";
        $this->headers =  "";
      }
      function attach($message,$name,$ctype = '')
      {
        if(empty($ctype)){
          switch(strrchr(basename($name), "." )){ 
            case ".gz":   $ctype =  "application/x-gzip"; break;
            case ".tgz":  $ctype =  "application/x-gzip"; break;
            case ".zip":  $ctype =  "application/zip";    break;
            case ".pdf":  $ctype =  "application/pdf";    break;       
            case ".png":  $ctype =  "image/png";  break;
            case ".gif":  $ctype =  "image/gif";  break;
            case ".jpg":  $ctype =  "image/jpeg"; break;
            case ".txt":  $ctype =  "text/plain"; break;
            case ".htm":  $ctype =  "text/html";  break;
            case ".html": $ctype =  "text/html";  break;
            default:      $ctype =  "application/octet-stream"; break;
          }
        }
        $this->parts[] = 
                        array (
                          "ctype" => $ctype,
                          "message" => $message,
                          "encode" => @$encode,
                          "name" => $name
                        );
      }
      function build_message($part)
      {
        $message = $part[ "message"];
        $message = chunk_split(base64_encode($message));
        $encoding =  "base64";
        return  "Content-Type: ".$part[ "ctype"].
                ($part[ "name"]? "; name = \"".$part[ "name"]. "\"" :  "" ).
                "\nContent-Transfer-Encoding: $encoding\n\n$message\n";
      }
      function build_multipart() 
      {
        $boundary =  "b".md5(uniqid(time()));
        $multipart =  "Content-Type: multipart/mixed; boundary = $boundary\n\nThis is a MIME encoded message.\n\n--$boundary";
        for($i = sizeof($this->parts) - 1; $i >= 0; $i--) 
        {
          $multipart .=  "\n".$this->build_message($this->parts[$i]). "--$boundary";
        }
        return $multipart.=  "--\n";
      }
      function send() 
      {
        $mime =  "";
        if (!empty($this->from))    $mime .=  "From: ".$this->from. "\n";
        if (!empty($this->headers)) $mime .= $this->headers. "\n";
        if (!empty($this->body))    $this->attach($this->body,  "",  "text/html" );
        $mime .=  "MIME-Version: 1.0\n".$this->build_multipart();
        mail($this->to, $this->subject,  "", $mime);
      }
    };
?>