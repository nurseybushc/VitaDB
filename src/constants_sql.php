<?php
    function GetColumnsSelect(){
        $columns_select = array(); 
        $columns_select["list_hbs_json"] = "name,icon,version,author,type,description,id,data,date,titleid,screenshots,long_description,downloads,status,source,release_page,trailer,size,data_size,url";
        $columns_select["get_last_updates"] = "author,object,date,id,hb";

        return $columns_select;
    }
    
    function GetStatementSelect(){
        $columns_select = GetColumnsSelect();

        $statement_select = array(); 
        $statement_select["get_hb_json"] = "SELECT {$columns_select['list_hbs_json']} FROM vitadb WHERE id=?";
        $statement_select["list_hbs_by_titleid"] = "SELECT {$columns_select['list_hbs_json']} FROM vitadb WHERE type < 8 ORDER BY titleid ASC";
        $statement_select["list_hbs_json"] = "SELECT {$columns_select['list_hbs_json']} FROM vitadb WHERE type < 8 ORDER BY date DESC"; 
        $statement_select["get_last_updates"] = "SELECT {$columns_select['get_last_updates']} FROM vitadb_log ORDER BY id DESC LIMIT 5"; 

        return $statement_select;
    }
?>