document.addEventListener("DOMContentLoaded", function() {
    loadCategoriesAndQuizzes();

    document.getElementById("category").addEventListener("change", function() {
        loadCategoriesAndQuizzes(this.value);
    });
});

function loadCategoriesAndQuizzes(categoryId = '') {
    fetch(`fetch_data.php?category_id=${categoryId}`)
        .then(response => response.json())
        .then(data => {
            const categorySelect = document.getElementById('category');
            categorySelect.innerHTML = '<option value="">All Categories</option>';
            data.categories.forEach(category => {
                categorySelect.innerHTML += `<option value="${category.id}">${category.name}</option>`;
            });

            const quizzesDiv = document.getElementById('quizzes');
            quizzesDiv.innerHTML = '';
            data.quizzes.forEach(quiz => {
                quizzesDiv.innerHTML += `<div class="quiz-card">
                    <h3>${quiz.title}</h3>
                    <p>${quiz.description}</p>
                </div>`;
            });
        });
}
