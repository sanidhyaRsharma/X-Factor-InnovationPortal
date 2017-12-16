<?php
function validateFormData($formData)
    {
        $formData = trim(stripslashes(htmlspecialchars(strip_tags(str_replace(array('(',')'),' ',$formData)),ENT_QUOTES))); //ENT QUOTES ALLOWS QUOTES
        return $formData;         
            
    }

    function validatePassword($formData)
    {
        $formData = trim(stripslashes(htmlspecialchars($formData))); //ENT QUOTES ALLOWS QUOTES
        return $formData;                 
    }
?>