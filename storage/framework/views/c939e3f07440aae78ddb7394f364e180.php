<?php $__env->startSection('content'); ?>

<?php
$color = $lesson->color_theme ?? '#1565c0';
$icon  = $lesson->icon ?? '📝';
$typeLabels = ['alphabet'=>'Alphabet','grammar'=>'Grammar','vocabulary'=>'Vocabulary','phrases'=>'Phrases','general'=>'General'];
$typeLabel  = $typeLabels[$lesson->type ?? 'general'] ?? 'Lesson';
$backUrl    = match($lesson->type ?? 'general') {
    'alphabet'   => '/lessons/alphabet',
    'grammar'    => '/lessons/grammar',
    'vocabulary' => '/lessons/vocabulary',
    'phrases'    => '/lessons/phrases',
    default      => '/lessons',
};

$keyPoints = $lesson->key_points_array;
$examples  = $lesson->examples_array;
?>

<div class="card" style="border-top:5px solid <?php echo e($color); ?>;">
    <div style="display:flex; align-items:center; gap:10px; margin-bottom:12px; flex-wrap:wrap;">
        <a href="<?php echo e($backUrl); ?>" style="color:<?php echo e($color); ?>; text-decoration:none; font-size:0.9em;">← Back to <?php echo e($typeLabel); ?></a>
        <span style="background:<?php echo e($color); ?>20; color:<?php echo e($color); ?>; padding:3px 12px; border-radius:20px; font-size:0.8em; font-weight:600;">
            <?php echo e($icon); ?> <?php echo e($typeLabel); ?>

        </span>
        <span style="padding:3px 12px; border-radius:20px; font-size:0.8em; font-weight:600; color:white;
                     background:<?php echo e($lesson->status == 'approved' ? '#28a745' : ($lesson->status == 'rejected' ? '#dc3545' : '#ffc107')); ?>">
            <?php echo e(strtoupper($lesson->status)); ?>

        </span>
    </div>

    <h1 style="color:<?php echo e($color); ?>; margin:0 0 8px; font-size:2em;"><?php echo e($icon); ?> <?php echo e($lesson->title); ?></h1>
    <?php if($lesson->subtitle): ?>
        <p style="color:#666; font-size:1.1em; margin:0 0 12px;"><?php echo e($lesson->subtitle); ?></p>
    <?php endif; ?>
    <p style="color:#aaa; font-size:0.85em; margin:0;">
        👤 By <strong style="color:#555;"><?php echo e($lesson->user->name ?? 'Teacher'); ?></strong>
        &nbsp;·&nbsp;
        📅 <?php echo e($lesson->created_at->format('d M Y')); ?>

    </p>
</div>

<div class="card">
    <div style="font-size:1.05em; line-height:1.9; color:#333; white-space:pre-wrap;"><?php echo e($lesson->content); ?></div>
</div>

<?php if(count($keyPoints) > 0): ?>
<div class="card" style="border-left:4px solid <?php echo e($color); ?>;">
    <h2 style="color:<?php echo e($color); ?>; margin-top:0;">📌 Key Points</h2>
    <div style="display:flex; flex-direction:column; gap:10px;">
        <?php $__currentLoopData = $keyPoints; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $point): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div style="display:flex; align-items:flex-start; gap:12px; background:<?php echo e($color); ?>0d; padding:12px 16px; border-radius:8px;">
            <span style="color:<?php echo e($color); ?>; font-size:1.2em; min-width:24px; font-weight:bold;">✅</span>
            <p style="margin:0; color:#333; line-height:1.6; font-size:1em;"><?php echo e($point); ?></p>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<?php if(count($examples) > 0): ?>
<div class="card">
    <h2 style="color:#ff9800; margin-top:0;">💡 Examples</h2>
    <div style="display:flex; flex-direction:column; gap:10px;">
        <?php $__currentLoopData = $examples; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $example): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php
            $parts = explode(' — ', $example, 2);
            $ex    = trim($parts[0]);
            $trans = isset($parts[1]) ? trim($parts[1]) : null;
        ?>
        <div style="display:flex; align-items:center; gap:15px; background:#fff8e1; padding:14px 18px; border-radius:10px; border-left:3px solid #fbc02d; flex-wrap:wrap;">
            <span style="font-weight:700; color:#333; font-size:1.05em; font-style:italic; flex:1; min-width:200px;"><?php echo e($ex); ?></span>
            <?php if($trans): ?>
                <span style="color:#777; font-size:0.92em; flex:1; min-width:150px;"><?php echo e($trans); ?></span>
            <?php endif; ?>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php endif; ?>

<?php if($lesson->practice_tip): ?>
<div class="card" style="background:#e8f5e9; border-left:4px solid #4caf50;">
    <h3 style="color:#2e7d32; margin-top:0;">✅ Practice Tip</h3>
    <p style="color:#555; margin:0; line-height:1.7;"><?php echo e($lesson->practice_tip); ?></p>
    <a href="/exercises" class="btn" style="background:#4caf50; margin-top:15px; display:inline-block;">Go to Exercises →</a>
</div>
<?php else: ?>
<div class="card" style="background:#e8f5e9; text-align:center;">
    <a href="/exercises" class="btn" style="background:#4caf50;">Go to Exercises →</a>
</div>
<?php endif; ?>

<?php if($lesson->file_path): ?>
<div class="card" style="background:#e3f2fd; border:1px solid #bbdefb;">
    <h3 style="margin:0 0 12px; color:#1565c0;">📎 Attached File</h3>
    <a href="<?php echo e(asset('storage/' . $lesson->file_path)); ?>" target="_blank" class="btn" style="background:<?php echo e($color); ?>; text-decoration:none;">
        📥 Open / Download File
    </a>
    <p style="font-size:0.8em; color:#666; margin-top:8px;"><?php echo e(basename($lesson->file_path)); ?></p>
</div>
<?php endif; ?>

<?php if(Auth::id() == $lesson->user_id || Auth::user()->hasRole('admin')): ?>
<div class="card" style="background:#f8f9fa; display:flex; gap:12px; flex-wrap:wrap; align-items:center;">
    <strong style="color:#555;">Actions:</strong>
    <?php if(Auth::id() == $lesson->user_id): ?>
        <a href="/lessons/<?php echo e($lesson->id); ?>/edit" class="btn" style="background:#007bff;">✏️ Edit</a>
    <?php endif; ?>
    <form action="/lessons/<?php echo e($lesson->id); ?>" method="POST" style="display:inline;" onsubmit="return confirm('Delete this lesson?')">
        <?php echo csrf_field(); ?> <?php echo method_field('DELETE'); ?>
        <button type="submit" class="btn" style="background:#dc3545;">🗑️ Delete</button>
    </form>
</div>
<?php endif; ?>

<?php if (\Illuminate\Support\Facades\Blade::check('role', 'reviewer')): ?>
<?php if($lesson->status == 'pending'): ?>
<div class="card" style="background:#fff9c4; border:1px solid #fbc02d;">
    <h3 style="color:#e65100; margin:0 0 12px;">🔍 Reviewer Actions</h3>
    <div style="display:flex; gap:12px; flex-wrap:wrap;">
        <a href="/lessons/<?php echo e($lesson->id); ?>/approve" class="btn" style="background:#28a745;">✅ Approve</a>
        <a href="/lessons/<?php echo e($lesson->id); ?>/reject" class="btn" style="background:#dc3545;">❌ Reject</a>
    </div>
</div>
<?php endif; ?>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', array_diff_key(get_defined_vars(), ['__data' => 1, '__path' => 1]))->render(); ?><?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/lessons/show.blade.php ENDPATH**/ ?>