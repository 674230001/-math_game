<?php
session_start();
if (!isset($_SESSION['score'])) $_SESSION['score'] = 0;
$categories = [
 ['title'=>'บวกเลข','desc'=>'ฝึกบวกเลขให้ไวขึ้น','icon'=>'＋','color'=>'mint','level'=>'เริ่มต้น','count'=>'10 ข้อ'],
 ['title'=>'ลบเลข','desc'=>'ฝึกคิดเลขอย่างแม่นยำ','icon'=>'−','color'=>'purple','level'=>'เริ่มต้น','count'=>'10 ข้อ'],
 ['title'=>'คูณเลข','desc'=>'ท้าทายสูตรคูณ','icon'=>'×','color'=>'orange','level'=>'ปานกลาง','count'=>'10 ข้อ'],
 ['title'=>'หารเลข','desc'=>'ฝึกการหารอย่างสนุก','icon'=>'÷','color'=>'mint','level'=>'ปานกลาง','count'=>'10 ข้อ'],
];
?>
<!doctype html><html lang="th"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>Math Quest | เรียนเลขให้สนุก</title><link rel="stylesheet" href="assets/style.css"></head><body>
<div class="app-shell">
<aside class="sidebar"><a class="brand" href="index.php"><span class="brand-mark">∑</span><span>Math<span class="brand-accent">Quest</span><small>LEARN • PLAY • LEVEL UP</small></span></a>
<nav><a class="nav-link active" href="index.php"><span>⌂</span> หน้าหลัก</a><a class="nav-link" href="quiz.php"><span>✦</span> เล่นแบบทดสอบ</a><a class="nav-link" href="scores.php"><span>🏆</span> คะแนนของฉัน</a><a class="nav-link" href="admin.php"><span>⚙</span> จัดการโจทย์</a></nav>
<div class="sidebar-bottom"><div class="mini-avatar">✿</div><div><strong>นักผจญภัย</strong><small>Math Explorer</small></div><span class="online-dot"></span></div></aside>
<main class="main-content"><header class="topbar"><div><span class="eyebrow">วันใหม่ ความท้าทายใหม่</span><h1>พร้อมลุยโจทย์วันนี้หรือยัง? <span class="wave">✦</span></h1></div><a class="profile-pill" href="scores.php"><span class="avatar">M</span><span><b>My Profile</b><small>ผู้เล่นทั่วไป</small></span><span class="chevron">⌄</span></a></header>
<section class="hero"><div class="hero-copy"><span class="hero-tag">✦ YOUR MATH ADVENTURE</span><h2>คณิตศาสตร์<br>ก็สนุกได้กว่าที่คิด!</h2><p>ฝึกทักษะวันละนิด สะสมคะแนน แล้วก้าวสู่เลเวลถัดไป</p><a class="btn btn-light" href="quiz.php">เริ่มภารกิจเลย <span>→</span></a><div class="hero-foot"><span>✓ ฝึกได้ทุกวัน</span><span>✧ สนุกทุกระดับ</span></div></div><div class="hero-art"><div class="orbit orbit-one"></div><div class="orbit orbit-two"></div><div class="math-tile tile-one">+</div><div class="math-tile tile-two">×</div><div class="math-tile tile-three">÷</div><div class="math-core">∑<small>MATH<br>POWER</small></div><div class="floating-note">✨ Keep going!</div></div></section>
<section class="stats-grid"><div class="stat-card"><span class="stat-icon mint-bg">⚡</span><div><small>คะแนนสะสม</small><strong><?= (int)$_SESSION['score'] ?> <em>XP</em></strong></div><span class="stat-trend">↗</span></div><div class="stat-card"><span class="stat-icon purple-bg">🏆</span><div><small>เลเวลปัจจุบัน</small><strong>Level 1</strong></div><span class="stat-trend">✦</span></div><div class="stat-card"><span class="stat-icon orange-bg">🎯</span><div><small>ภารกิจวันนี้</small><strong>เริ่มต้นได้เลย</strong></div><span class="stat-trend">→</span></div></section>
<section class="section-heading"><div><span class="eyebrow">CHOOSE YOUR QUEST</span><h2>เลือกภารกิจของคุณ</h2><p>เลือกหมวดที่อยากฝึก แล้วไปเก็บ XP กันเลย</p></div><a class="text-link" href="quiz.php">ดูภารกิจทั้งหมด <span>→</span></a></section>
<section class="quest-grid"><?php foreach($categories as $c): ?><a class="quest-card <?= $c['color'] ?>" href="quiz.php?category=<?= urlencode($c['title']) ?>"><div class="quest-top"><span class="quest-icon"><?= $c['icon'] ?></span><span class="arrow-circle">↗</span></div><span class="level-tag"><?= $c['level'] ?></span><h3><?= $c['title'] ?></h3><p><?= $c['desc'] ?></p><div class="quest-meta"><span>☷ <?= $c['count'] ?></span><span>เริ่มเล่น →</span></div></a><?php endforeach; ?></section>
<footer>Made with <span>♥</span> for curious minds · Math Quest</footer></main></div></body></html>