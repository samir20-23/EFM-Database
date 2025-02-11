# General Context
You are working on a Laravel application that allows the members of a hiking association to share a single hiking proposal.
Other members can then add reviews and suggestions for improvement.

## The application must allow:
- Each member can propose a single hike (One-to-One relation with Member).
- Each hike can receive multiple reviews (One-to-Many relation with Review).
- Reviews can contain improvement suggestions (Many-to-Many relation with Suggestion).
- The application must display the hiking proposals, update some of their data, and allow editing and deleting reviews.

## The exam is divided into two parts:

### 🔴 Part 1: Live Coding (30 minutes, 20 points)
- Display the hiking proposals with their reviews.
- Increment the view count of a hike and its reviews via a Service.
- Automatically add a suggestion "Recommended Hike" if a hike receives more than 10 positive reviews.

### Part 2: Mini-Project (45 minutes, 20 points)
- Add a form to modify the suggestions associated with a review.
- Add "Edit" and "Delete" buttons for each review.
- Improve the page design with CSS.

---

## 🔴 Part 1: Live Coding (30 min - 20 points)

### 📌 Objective:
- Display the list of hiking proposals with their reviews.
- Manage the view count of the proposals and reviews.
- Dynamically modify the improvement suggestions of a review (Many-to-Many).

### Grading & Questions (20 points)

#### 1️⃣ Creating the `RandonneeService` Class (6 points)
##### 📌 Question 1: 
Create a `RandonneeService` class in `app/Services/` and add a `getRandonneesWithAvis()` method that returns the list of hikes with their relationships (member, review, suggestions). (2 points)
##### 📌 Question 2: 
Add a method `incrementRandonneeViews(Randonnee $randonnee)` to increment the view count of the hike and save the modification. (2 points)
##### 📌 Question 3: 
Add a method `incrementAvisViews(Randonnee $randonnee)` to increment the view count of each review related to the hike and save the modifications. (2 points)

#### 2️⃣ Implementing the `RandonneeController` (6 points)
##### 📌 Question 4: 
Create a `RandonneeController` and inject `RandonneeService` into its constructor via Dependency Injection. (2 points)
##### 📌 Question 5: 
Implement an `index()` method that:
- Retrieves the list of hikes via `RandonneeService`.
- Checks if a hike should automatically receive the "Recommended Hike" suggestion when it exceeds 10 positive reviews.
- Returns the data to the `index.blade.php` view. (4 points)

#### 3️⃣ Creating the `index.blade.php` View (6 points)
##### 📌 Question 6: 
Create a view `resources/views/randonnees/index.blade.php` that displays the hiking proposals in a table format with the following columns:
- Name of the hike.
- Name of the member (One-to-One relation).
- Number of views of the hike.
- List of reviews with their own view counter (One-to-Many relation).
- List of improvement suggestions associated with the reviews (Many-to-Many relation). (4 points)
##### 📌 Question 7: 
Test the correct functioning of the display and ensure that the views of hikes and reviews are properly incremented after each page refresh. (2 points)

#### 4️⃣ Defining the Route and Test (2 points)
##### 📌 Question 8: 
Declare a route `/randonnees` in `routes/web.php` to call the `index()` method of the `RandonneeController`. (1 point)
##### 📌 Question 9: 
Launch the application, test the display in the browser, and verify that:
- The hiking proposals and their reviews are displayed correctly.
- The views of hikes and reviews are incremented correctly.
- Hikes with more than 10 positive reviews automatically receive the "Recommended Hike" suggestion. (1 point)

---

## Part 2: Mini-Project (45 min - 20 points)

### 📌 Objective:
- Add a feature to edit the suggestions associated with the reviews.
- Allow the deletion of reviews.
- Improve the design and responsiveness of the interface.

### Grading & Questions (20 points)

#### 1️⃣ Modifying the Suggestions of a Review (8 points)
##### 📌 Question 1: 
Add a method `updateAvisSuggestions(Avis $avis, array $suggestionsIds)` in `RandonneeService` to modify the suggestions associated with a review. (3 points)
##### 📌 Question 2: 
Create an `edit($id)` method in `AvisController` that returns an edit form with the list of available suggestions. (2 points)
##### 📌 Question 3: 
Implement an `update(Request $request, $id)` method in `AvisController` to update the suggestions associated with a review using `RandonneeService`. (2 points)
##### 📌 Question 4: 
Implement a `show($id)` method in `ArticleController`. (1 point)

#### 2️⃣ Adding "Edit" and "Delete" Buttons (6 points)
##### 📌 Question 4: 
Add a column in `index.blade.php` with an "Edit" button that redirects to the review edit page. (2 points)
##### 📌 Question 5: 
Add a "Delete" button with a DELETE form to remove a review. (2 points)
##### 📌 Question 6: 
Implement the `destroy($id)` method in `AvisController` to handle the deletion of a review. (2 points)

#### 3️⃣ Improving the Display with CSS (6 points)
##### 📌 Question 7: 
Modify `index.blade.php` to display the hikes and reviews in a stylized table by adding a CSS file. (2 points)
##### 📌 Question 8: 
Improve the edit form to make it clearer and more visually pleasing. (2 points)
##### 📌 Question 9: 
Ensure the buttons are properly aligned and the display is responsive. (2 points)

---

## Remark
- Total exam score: **40 points**.
- Bonus points:
  - A confirmation alert before deleting a review.
  - A filter to display only the most viewed hikes.
  - A search field to find a hike by its author.

Good luck! 🚀
