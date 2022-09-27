function displayCategoryContents(id) {
    let category = document.getElementById(id);
    let content = document.getElementById('dashboard-category-content');
    content.innerHTML = category.id;
}