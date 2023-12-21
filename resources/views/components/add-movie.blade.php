<!-- resources/views/movies/form.blade.php -->

<form action="/adminPage" method="post">
    @csrf
    <label class="text-white" for="title">Title:</label>
    <input type="text" name="title" required>
    <br>
    <label class="text-white" for="imageReference">image</label>
    <textarea name="imageReference" required></textarea>
    <br>
    <label class="text-white" for="duration">duration</label>
    <textarea name="duration" required></textarea>
    <br>
    <label class="text-white" for="releaseYear">release year</label>
    <textarea name="releaseYear" required></textarea>
    <br>
    <label class="text-white" for="descriptionShort">Description short:</label>
    <textarea name="descriptionShort" required></textarea>
    <br>
    <label class="text-white" for="rating">rating</label>
    <textarea name="rating" required></textarea>
    <br>
    <!-- Add form fields for other attributes if necessary -->
    <button class="text-white" type="submit">Add Movie</button>
</form>