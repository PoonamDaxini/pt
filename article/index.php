<?php

session_start();
require_once '../config/config.php';
if ($_SESSION['logged_in']) {
require_once CLASS_DIR . 'mysqlDatabaseClass.php';
require_once CLASS_DIR . 'illnessClass.php';
require_once CLASS_DIR . 'articleClass.php';
if ($_SESSION['userType'] == 'doctor') {
    if (isset($_REQUEST['addArticle']) || isset($_REQUEST['savedArticle'])) {
        if (isset($_REQUEST['post']) && !empty($_REQUEST['post']) && isset($_REQUEST['title']) && !empty($_REQUEST['title'])) {
            $objDatabase = new mysqlDatabaseClass();
            $objArticleClass = new articleClass();
            $arrArticle['title'] = $_REQUEST['title'];
            $arrArticle['article'] = $_REQUEST['post'];
            $arrArticle['illnessId'] = $_REQUEST['illid'] ? $_REQUEST['illid'] : 0;
            $arrArticle['owner'] = $_SESSION['uid'];
            $arrArticle['publish'] = isset($_REQUEST['publish']) ? 1 : 0;
            $arrArticle['creationDate'] = date("Y-m-d H:i:s", time());
            $objArticleClass->addArticle($objDatabase, $arrArticle);
			$message = "<div class='divClr'></div><div class='regularmsg'>Article submitted Successfully.</div>";
        }
    }
    if (isset($_REQUEST['updateArticle']) || isset($_REQUEST['saveEdit'])) {
        if (isset($_REQUEST['post']) && !empty($_REQUEST['post']) && isset($_REQUEST['title']) && !empty($_REQUEST['title'])) {
            $objDatabase = new mysqlDatabaseClass();
            $objArticleClass = new articleClass();
            $arrArticle['articleId'] = $_REQUEST['articleId'];
            $arrArticle['title'] = $_REQUEST['title'];
            $arrArticle['article'] = $_REQUEST['post'];
            $arrArticle['illnessId'] = $_REQUEST['illid'] ? $_REQUEST['illid'] : 0;
            $arrArticle['UpdatedBy'] = $_SESSION['uid'];
            $arrArticle['publish'] = isset($_REQUEST['publish']) ? 1 : 0;
            $arrArticle['updationDate'] = date("Y-m-d H:i:s", time());
            $objArticleClass->updateArticle($objDatabase, $arrArticle);
            $message = "<div class='divClr'></div><div class='regularmsg'>Article updated Successfully.</div>";
        }
    }
    if (isset($_REQUEST['delete'])) {
        $objDatabase = new mysqlDatabaseClass();
        $objArticleClass = new articleClass();
        $objArticleClass->deleteArticle($objDatabase, $_REQUEST['articleId']);
		$message = "<div class='divClr'></div><div class='regularmsg'>Article deleted Successfully.</div>";
    }
    if (isset($_REQUEST['action'])) {
        switch ($_REQUEST['action']) {
            case 'add';
                include 'view/addArticle_view.php';
                break;
            case 'edit';
                include 'view/editArticle_view.php';
                break;
        }
    } else {
        include_once 'view/doctorArticle_view.php';
    }
} else {
    if (isset($_REQUEST['action']) == 'getArticle') {
        include 'view/patientIllnessArticle_view.php';
    } else {
        include_once 'view/patientArticle_view.php';
    }
}
} else {
    header("Location:" . HTTP_HOST);
}
?>
