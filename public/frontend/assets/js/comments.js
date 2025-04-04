document.addEventListener('DOMContentLoaded', function() {
    // Handle reply button clicks
    document.querySelectorAll('.reply-btn').forEach(button => {
        button.addEventListener('click', function() {
            const commentId = this.getAttribute('data-comment-id');
            const replyForm = document.getElementById(`reply-form-${commentId}`);

            // Hide all other reply forms first
            document.querySelectorAll('.reply-form').forEach(form => {
                if (form.id !== `reply-form-${commentId}`) {
                    form.style.display = 'none';
                }
            });

            // Toggle current reply form
            replyForm.style.display = replyForm.style.display === 'none' ? 'block' : 'none';
        });
    });

    // Auto-focus textarea when reply form is shown
    document.addEventListener('click', function(e) {
        if (e.target.classList.contains('reply-btn')) {
            const commentId = e.target.getAttribute('data-comment-id');
            const textarea = document.querySelector(`#reply-form-${commentId} textarea`);
            if (textarea) {
                textarea.focus();
            }
        }
    });
});
