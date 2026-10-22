<?php
session_start();
$questions = [
 ['category'=>'บวกเลข','q'=>'12 + 8 = ?','answers'=>['18','20','22','24'],'correct'=>1],
 ['category'=>'ลบเลข','q'=>'25 − 9 = ?','answers'=>['14','15','16','17'],'correct'=>2],
 ['category'=>'คูณเลข','q'=>'7 × 6 = ?','answers'=>['36','40','42','48'],'correct'=>2],
 ['category'=>'หารเลข','q'=>'48 ÷ 6 = ?','answers'=>['6','7','8','9'],'correct'=>2],
 ['category'=>'บวกเลข','q'=>'17 + 16 = ?','answers'=>['31','32','33','34'],'correct'=>2],
];
if (isset($_GET['reset'])) { unset($_SESSION['quiz_result']); header('Location: quiz.php'); exit; }
if ($_SERVER['REQUEST_METHOD']==='POST') {
  $idx=(int)($_POST['idx']??0); $answer=(int)($_POST['answer']??-1);
  if(isset($questions[$idx])) {
    $correct=($answer===$questions[$idx]['correct']);
    if($correct) $_SESSION['score']=(int)($_SESSION['score']??0)+10;
    $_SESSION['quiz_result']=['correct'=>$correct,'q'=>$questions[$idx]['q'],'right'=>$questions[$idx]['answers'][$questions[$idx]['correct']],'answer'=>$questions[$idx]['answers'][$answer]??'ไม่ได้เลือก'];
  }
  header('Location: quiz.php?result=1'); exit;
}
$result=$_SESSION['quiz_result']??null; if(!isset($_GET['result'])) unset($_SESSION['quiz_result']);
$idx=max(0,min(count($questions)-1,(int)($_GET['q']??0))); $q=$questions[$idx];
?>
<!doctype html><html lang="th"><head><meta charset="utf-8"><meta name="viewport" content="width=device-width,initial-scale=1"><title>ทำภารกิจ | Math Quest</title><link rel="stylesheet" href="assets/style.css"></head><body><div class="app-shell"><aside class="sidebar"><a class="brand" href="index.php"><span class="brand-mark">∑</span><span>Math<span class="brand-accent">Quest</span><small>LEARN • PLAY • LEVEL UP</small></span></a><nav><a class="nav-link" href="index.php"><span>⌂</span> หน้าหลัก</a><a class="nav-link active" href="quiz.php"><span>✦</span> เล่นแบบทดสอบ</a><a class="nav-link" href="scores.php"><span>🏆</span> คะแนนของฉัน</a><a class="nav-link" href="admin.php"><span>⚙</span> จัดการโจทย์</a></nav><div class="sidebar-bottom"><div class="mini-avatar">✿</div><div><strong>นักผจญภัย</strong><small>Math Explorer</small></div><span class="online-dot"></span></div></aside><main class="main-content"><header class="topbar"><div><span class="eyebrow">QUEST MODE</span><h1>ภารกิจฝึกสมอง <span class="wave">✦</span></h1></div><a class="profile-pill" href="scores.php"><span class="avatar">M</span><span><b>My Profile</b><small>ผู้เล่นทั่วไป</small></span></a></header>
<div class="quiz-layout"><section class="quiz-card"><div class="quiz-card-top"><span class="level-tag">✦ <?= htmlspecialchars($q['category']) ?></span><span class="question-count">คำถาม <?= $idx+1 ?> / <?= count($questions) ?></span></div><div class="progress-track"><span style="width:<?= (($idx+1)/count($questions))*100 ?>%"></span></div>
<?php if(isset($_GET['result']) && $result): ?><div class="result-symbol"><?= $result['correct']?'🎉':'💪' ?></div><h2 class="quiz-question"><?= $result['correct']?'ยอดเยี่ยม! ตอบถูกต้อง':'ยังไม่ถูก ลองอีกครั้งนะ' ?></h2><p class="quiz-sub"><?= htmlspecialchars($result['q']) ?> คำตอบที่ถูกคือ <b><?= htmlspecialchars($result['right']) ?></b></p><div class="result-points"><?= $result['correct']?'+10 XP':'ฝึกต่อเพื่อสะสม XP' ?></div><div class="quiz-actions"><a class="btn btn-primary" href="quiz.php?q=<?= ($idx+1)%count($questions) ?>">คำถามถัดไป →</a><a class="btn btn-outline" href="quiz.php?reset=1">เริ่มใหม่</a></div>
<?php else: ?><h2 class="quiz-question"><?= htmlspecialchars($q['q']) ?></h2><p class="quiz-sub">เลือกคำตอบที่ถูกต้องที่สุด</p><form method="post" class="answer-grid"><input type="hidden" name="idx" value="<?= $idx ?>"><?php foreach($q['answers'] as $i=>$ans): ?><label class="answer-option"><input type="radio" name="answer" value="<?= $i ?>" required><span class="answer-letter"><?= chr(65+$i) ?></span><span><?= htmlspecialchars($ans) ?></span><span class="answer-check">✓</span></label><?php endforeach; ?><button class="btn btn-primary submit-answer" type="submit">ยืนยันคำตอบ <span>→</span></button></form><?php endif; ?></section><aside class="quiz-side"><div class="side-mascot">✿</div><h3>คุณทำได้!</h3><p>ทุกคำถามคืออีกหนึ่งก้าวของการพัฒนาตัวเอง</p><div class="tip-box"><b>💡 เคล็ดลับ</b><p>ค่อย ๆ คิด ไม่ต้องรีบ อ่านโจทย์ให้ครบก่อนเลือกคำตอบ</p></div><div class="xp-box"><span>⚡ คะแนน XP</span><strong><?= (int)($_SESSION['score']??0) ?></strong><small>สะสมจากคำตอบที่ถูก</small></div></aside></div><footer>Made with <span>♥</span> for curious minds · Math Quest</footer></main></div></body></html>