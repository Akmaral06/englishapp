<?php if(isset($teacherLessons) && $teacherLessons->count() > 0): ?>
<div style="margin-top:10px;">
    <div class="card" style="border-left:5px solid var(--primary); background:#f8fbff; padding:0; overflow:hidden;">
        <div style="padding:20px 25px 15px;">
            <h2 style="color:var(--primary); margin-top:0;">👨‍🏫 Lessons from Our Teachers</h2>
            <p style="color:#666; margin-bottom:0;">Additional lessons on this topic created by our teachers:</p>
        </div>
        <div style="display:flex; flex-direction:column; gap:0;">
            <?php $__currentLoopData = $teacherLessons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $i => $tl): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $color = $tl->color_theme ?? '#1565c0'; ?>
            <a href="/lessons/<?php echo e($tl->id); ?>" style="text-decoration:none; display:block;
               border-top:<?php echo e($i > 0 ? '1px solid #e3f2fd' : 'none'); ?>;">
                <div style="padding:18px 25px; display:flex; align-items:center; gap:18px;
                            transition:background 0.15s; background:white; flex-wrap:wrap;"
                     onmouseover="this.style.background='#f0f7ff'"
                     onmouseout="this.style.background='white'">
                    <div style="font-size:2.2em; min-width:52px; text-align:center;
                                width:52px; height:52px; background:<?php echo e($color); ?>15;
                                border-radius:12px; display:flex; align-items:center; justify-content:center;">
                        <?php echo e($tl->icon ?? '📝'); ?>

                    </div>
                    <div style="flex:1; min-width:0;">
                        <div style="font-weight:700; color:<?php echo e($color); ?>; font-size:1.08em; margin-bottom:3px;">
                            <?php echo e($tl->title); ?>

                        </div>
                        <?php if($tl->subtitle): ?>
                        <div style="color:#666; font-size:0.88em; margin-bottom:4px;"><?php echo e($tl->subtitle); ?></div>
                        <?php endif; ?>
                        <div style="display:flex; gap:12px; align-items:center; flex-wrap:wrap;">
                            <span style="color:#aaa; font-size:0.8em;">👤 <?php echo e($tl->user->name ?? 'Teacher'); ?></span>
                            <?php if($tl->key_points_array && count($tl->key_points_array) > 0): ?>
                            <span style="background:<?php echo e($color); ?>15; color:<?php echo e($color); ?>; font-size:0.75em; padding:2px 8px; border-radius:10px; font-weight:600;">
                                <?php echo e(count($tl->key_points_array)); ?> key points
                            </span>
                            <?php endif; ?>
                            <?php if($tl->examples_array && count($tl->examples_array) > 0): ?>
                            <span style="background:#fff8e1; color:#f57c00; font-size:0.75em; padding:2px 8px; border-radius:10px; font-weight:600;">
                                <?php echo e(count($tl->examples_array)); ?> examples
                            </span>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div style="color:<?php echo e($color); ?>; font-size:1.3em; font-weight:bold;">→</div>
                </div>
            </a>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </div>
    </div>
</div>
<?php endif; ?>
<?php /**PATH D:\xam\htdocs\englishapp-fixed (1)\englishapp\resources\views/partials/teacher_lessons.blade.php ENDPATH**/ ?>