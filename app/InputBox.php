<?php
    namespace App;

    class InputBox{

        public static function text($name){
            return "<div class=\"form=group\">
            </br>
            <label form=\"{$name}\">Title</label>
            <input type=\"text\" class=\"form-control\" name=\"{$name}\" id=\"{$name}\">
        </div>";
        }

    }
