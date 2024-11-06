<?php
session_start();

include('includes/header.inc');
include('includes/nav.inc');
include("includes/db_connect.inc");

if (isset($_SESSION['usrmsg'])): ?>
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <?= htmlspecialchars($_SESSION['usrmsg']) ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    <?php unset($_SESSION['usrmsg']); ?>
<?php endif; ?>

<main class="main1">
    <div class="container">
        <div class="textContent1">
            <h1>PETS VICTORIA</h1>
            <h2>WELCOME TO PET <br>ADOPTION</h2>
        </div>
        <div id="petCarousel" class="carousel slide w-50 mx-auto" data-bs-ride="carousel">
