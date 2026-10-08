const recipes = [
  {
    id: 1,
    title: "blank",
    time: "blank",
    difficulty: "blank",
    description: "blank",
    image: "../images/placeholder.png",
    ingredients: ["blank", "blank", "blank"],
    steps: ["blank", "blank", "blank"]
  },
  {
    id: 2,
    title: "blank",
    time: "blank",
    difficulty: "blank",
    description: "blank",
    image: "../images/placeholder.png",
    ingredients: ["blank", "blank", "blank"],
    steps: ["blank", "blank", "blank"]
  },
  {
    id: 3,
    title: "blank",
    time: "blank",
    difficulty: "blank",
    description: "blank",
    image: "../images/placeholder.png",
    ingredients: ["blank", "blank", "blank"],
    steps: ["blank", "blank", "blank"]
  }
];

const params = new URLSearchParams(window.location.search);
const id = Number(params.get("id")) || 1;
const recipe = recipes.find(r => r.id === id) || recipes[0];

document.getElementById("recipeTitle").textContent = recipe.title;
document.getElementById("recipeTime").textContent = recipe.time;
document.getElementById("recipeDifficulty").textContent = recipe.difficulty;
document.getElementById("recipeDescription").textContent = recipe.description;
document.getElementById("recipeImage").src = recipe.image;

const ingredientList = document.getElementById("ingredientList");
ingredientList.innerHTML = "";
recipe.ingredients.forEach(item => {
  const li = document.createElement("li");
  li.textContent = item;
  ingredientList.appendChild(li);
});

const stepList = document.getElementById("stepList");
stepList.innerHTML = "";
recipe.steps.forEach(item => {
  const li = document.createElement("li");
  li.textContent = item;
  stepList.appendChild(li);
});