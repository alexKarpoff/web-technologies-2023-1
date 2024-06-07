class Pizza {
    constructor(type, size) {
        const types = {
            Margarita: { price: 500, calories: 300 },
            Pepperoni: { price: 800, calories: 400 },
            Bavarian: { price: 700, calories: 450 }
        };

        const sizes = {
            Small: { price: 100, calories: 100 },
            Large: { price: 200, calories: 200 }
        }

        this.basePrice = types[type].price + sizes[size].price;
        this.baseCalories = types[type].calories + sizes[size].calories;
        this.kind = type;
        this.toppings = [];
        this.size = size;  
    }

    addTopping(topping) {
        const toppingDetails = {
            "Сливочная моцарелла": { price: this.size === "Large" ? 100 : 50, calories: 20  },
            "Сырный борт": { price: this.size === "Large" ? 300 : 150, calories: 50 },
            "Чедер и пармезан": { price: this.size === "Large" ? 300 : 150, calories: 50 }
        };
        this.toppings.push({ topping, ...toppingDetails[topping] });
    }
  
    calculatePrice() {
        return this.basePrice + this.toppings.reduce((sum, cur) => sum + cur.price, 0);
    }

    calculateCalories() {
        return this.baseCalories + this.toppings.reduce((sum, cur) => sum + cur.calories, 0);
    }
  
    removeTopping(topping) {
        this.toppings = this.toppings.filter(t => t.topping !== topping);
    }

    getSize() {
        return this.size;
    }

    getToppings() {
        return this.toppings.map(t => t.topping);
    }
  
    getKind = () => this.kind
}


let pizza = new Pizza("Margarita", "Large");
pizza.addTopping("Сливочная моцарелла");
pizza.addTopping("Сырный борт");
console.log(`Итого: ${pizza.calculatePrice()} рублей`);
console.log(`Всего кКал: ${pizza.calculateCalories()}`);
console.log(`${pizza.getSize()}`)