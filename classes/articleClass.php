<?php

class articleClass {

    function getArticleDetail($objdatabase) {
        $query = "Select * from article";
        $objdatabase->query($query);
        $numrows = $objdatabase->getnumrows();
        if ($numrows > 0) {
            $result = $objdatabase->getDbData();
            return $result;
        }
    }

    function addArticle($objDatabase, $arrArticle) {

        $query = "insert into article (illnessId,Title,article,owner,publish,creationDate) values ('";
        $query .= $objDatabase->safe_string($arrArticle['illnessId']) . "','";
        $query .= $objDatabase->safe_string($arrArticle['title']) . "','";
        $query .= $objDatabase->safe_string($arrArticle['article']) . "','";
        $query .= $objDatabase->safe_string($arrArticle['owner']) . "','";
        $query .= $objDatabase->safe_string($arrArticle['publish']) . "','";
        $query .= $objDatabase->safe_string($arrArticle['creationDate']) . "')";

        $result = $objDatabase->query($query);
    }

    function updateArticle($objDatabase, $arrArticle) {

        $query = "update article set illnessId = '".
        $query .= $objDatabase->safe_string($arrArticle['illnessId']) . "',Title = '";
        $query .= $objDatabase->safe_string($arrArticle['title']) . "',article = '";
        $query .= $objDatabase->safe_string($arrArticle['article']) . "', UpdatedBy ='";
        $query .= $objDatabase->safe_string($arrArticle['UpdatedBy']) . "',publish ='";
        $query .= $objDatabase->safe_string($arrArticle['publish']) . "',updationDate ='";
        $query .= $objDatabase->safe_string($arrArticle['updationDate']) . "'";
        $query .= " where articleId=".$objDatabase->safe_string($arrArticle['articleId']);

        $result = $objDatabase->query($query);
    }

    function deleteArticle($objDatabase , $articleId){
        $query = "delete from article where articleId=".$objDatabase->safe_string($articleId);
        $objDatabase->query($query);
    }

    function getArticle($objdatabase , $articleId){
        $query = "select * from article where articleId=".$objdatabase->safe_string($articleId);

        $objdatabase->query($query);
        $numrows = $objdatabase->getnumrows();
        if ($numrows > 0) {
            $result = $objdatabase->getDbData();
            return $result;
        }
    }

    function getArticleBasedOnIllness($objdatabase , $illnessId){
        $query = "select * from article where illnessId=".$objdatabase->safe_string($illnessId);

        $objdatabase->query($query);
        $numrows = $objdatabase->getnumrows();
        if ($numrows > 0) {
            $result = $objdatabase->getDbData();
            return $result;
        }
    }

}

?>
