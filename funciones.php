<?php
//nombre del archivo que hace el include
function ScopedInclude($file, $params = array())
{
    extract($params);
    include $file;
}
?>