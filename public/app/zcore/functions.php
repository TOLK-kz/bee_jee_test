<?php
/**
 * User: TOLK  Date: 07.04.19
 */

function isAdmin() {
  return isset($_SESSION["admin"]) && $_SESSION["admin"] == 1;
}