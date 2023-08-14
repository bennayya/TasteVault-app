-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 14, 2023 at 01:02 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `datatv`
--

-- --------------------------------------------------------

--
-- Table structure for table `cuisine`
--

CREATE TABLE `cuisine` (
  `IDcuisine` int(11) NOT NULL,
  `namecuisine` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `IDRECIPE` int(11) NOT NULL,
  `IDUSER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`IDRECIPE`, `IDUSER`) VALUES
(1, 1),
(12, 1),
(10, 1),
(1, 3),
(8, 3);

-- --------------------------------------------------------

--
-- Table structure for table `preference`
--

CREATE TABLE `preference` (
  `IDPREFERENCE` text NOT NULL,
  `NAMER` longtext DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `recipe`
--

CREATE TABLE `recipe` (
  `TITLE` text NOT NULL,
  `INGREDIENTS` text NOT NULL,
  `DESCRIPTION` text NOT NULL,
  `IMAGER` varchar(250) NOT NULL,
  `DATER` date DEFAULT NULL,
  `category` varchar(200) DEFAULT NULL,
  `IDRECIPE` int(11) NOT NULL,
  `IDUSER` int(11) DEFAULT NULL,
  `prix` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `recipe`
--

INSERT INTO `recipe` (`TITLE`, `INGREDIENTS`, `DESCRIPTION`, `IMAGER`, `DATER`, `category`, `IDRECIPE`, `IDUSER`, `prix`) VALUES
('Salsa verde baked eggs<3', '5 tbsp olive oil\r\n1 tsp smoked paprika\r\n1 tsp cumin seeds\r\n400g can cherry tomatoes\r\n200g fresh cherry tomatoes\r\n2 garlic cloves\r\n1 small bunch of parsley\r\n1 small bunch of basil\r\n½ small bunch of mint, leaves picked\r\n2 tbsp capers\r\n1 tsp Dijon mustard\r\n2 tbsp white wine vinegar\r\n200g baby spinach, washed\r\n4 eggs\r\n½ tsp chilli flakes (optional)\r\nflatbreads, to serve (optional)', 'Dunk flatbreads into these salsa verde baked eggs to soak up the lovely juices. Healthy and low in calories, it takes just 15 minutes to make\r\n\r\nPrep:5 mins.                                             \r\nCook:15 mins.                                    \r\nDrizzle 1 tbsp of the olive oil in a frying pan or skillet, and fry the paprika and cumin for 30 seconds over a medium heat. Add the canned tomatoes and fresh tomatoes, bring to the boil, then simmer with a lid on over a medium heat for 5-6 mins until the tomatoes have softened.\r\nMeanwhile, put the garlic, most of the parsley, the basil, mint, capers, mustard, white wine vinegar, 4 tbsp oil and 3 tbsp cold water in a mini food processor and blitz to a smooth paste. Season.\r\nStir the spinach into the pan with the tomatoes until wilted (put the lid back on for a few minutes, then stir again to help it wilt). Make four dips in the mixture and gently crack an egg into each one. Cover with a lid and cook over a medium heat for 6-8 mins, or until the eggs are just set. Uncover the pan, then drizzle over the herby sauce. Scatter over the reserved parsley and chilli flakes, if using. Serve with flatbreads, if you like.', 'eggs.jpg', '2023-08-09', 'diet', 1, 1, 50),
('Apple & blackberry jam', 'Prep:5 mins\r\nCook:45 mins\r\n\r\n500g Bramley apples, peeled, cored, quartered and cut into 2cm chunks\r\n1 lemon, juiced\r\n500g blackberries, fresh or frozen\r\n1kg granulated sugar', 'Put two small plates in the freezer ready to test the set of the jam. Put the apples in a heavy pan or preserving pan with the lemon juice and 250ml water. Bring up to the boil, then simmer for 5-8 mins until soft.\r\n\r\n\r\nAdd the blackberries and sugar and stir to combine. Stir over a low heat until the sugar his dissolved, then turn the heat up to medium and simmer for 30-35 mins until the jam is at setting stage.\r\nTo test the jam, take one of the plates out of the freezer and place a little bit of jam on it, if it sets and when you run your finger over it and it wrinkles, it means it’s ready.\r\n\r\n\r\nUsing a funnel, transfer the jam to a sterilised jar. Make sure you seal the lids once it’s cold. Will keep in the fridge for six months in a sealed, sterilised jar.', 'berry.jpg', '2023-08-09', 'Breakfast', 2, 11, 45),
('Cinnamon rolls recipe', '500g strong white bread flour, plus extra for dusting\r\n7g sachet fast-action dried yeast\r\n1 tsp ground cinnamon\r\n50g golden caster sugar\r\n200ml warm milk\r\n2 eggs\r\n100g butter, softened, plus extra for the tin\r\n2 tbsp golden syrup\r\n150g light brown soft sugar\r\n2 tbsp ground cinnamon\r\n125g butter, at room temperature\r\n50g soft cheese\r\n50g icing sugar\r\n¼ tsp vanilla extract', 'Tip all the ingredients for the dough, except the butter and golden syrup, into the bowl of a stand mixer with 1 tsp salt. Use a paddle attachment to combine everything until it begins to come together into a dough, then tip out onto a floured surface and knead until smooth, about 2 mins. Put it back in the bowl and gradually add the softened butter, 1-2 tsp at a time, while mixing on a medium setting. Alternatively, knead the butter in by hand until smooth. Flatten the dough to a square roughly 20 x 20cm, then cover and freeze for 30 mins, or chill for at least 1 hr.\r\nMeanwhile, butter and line the base and sides of a deep baking tray, roughly 20 x 30cm. To make the filling, mix the sugar with the cinnamon and a large pinch of sea salt, then set aside 2 tbsp. Beat in the butter to form a thick paste.\r\nLay the dough on a floured surface and roll to a neat rectangle roughly 35 x 25cm. Spread over the filling so it’s completely covered. Fold the bottom third of the dough into the middle, then fold over again to cover the top third. For the best results, chill the dough again for another 30 mins.\r\nRe-roll the dough to another rectangle about 40 x 30cm, then roll it up along the long edge into a tight log. To get the neatest spirals, cut in half, lift onto a tray and freeze for 15 mins to firm up, then cut into 12 equal-sized slices. Arrange the slices, spiral side-up, in the tin. Leave to prove in fridge for at least 1 hr, or up to 24 hrs.\r\nHeat the oven to 200C/180C fan/gas 6. Bake the buns for 20 mins, then scatter over the reserved cinnamon sugar and bake for 10-15 mins until deep brown.\r\nMeanwhile, mix the golden syrup with 2 tsp boiling water. As soon as the buns come out of the oven, brush them with the syrup glaze, then leave to cool a little. To make the icing, beat the soft cheese, icing sugar and vanilla together, then gradually add 1-2 tbsp boiling water to create a thick but pourable consistency. Drizzle the icing over the buns.', 'Cinnamon.jpg', '2023-08-08', 'lunch', 4, 3, 100),
('Prawn & egg on toast', '3 eggs\r\n250g peeled and cooked prawns (defrosted if frozen)\r\n3 tbsp mayonnaise\r\n1 lemon, juiced\r\n4 thick slices white bread\r\nbutter, to serve\r\nsmall bunch of chives, finely sliced, to serve', '\r\nBring a medium pan of water to the boil, then carefully lower in the eggs and cook for 9 mins. Remove to a bowl of iced water using a slotted spoon and leave to stand for 10 mins until cold. Peel, then finely chop.\r\nTip the chopped egg into a bowl along with the prawns. Stir in the mayonnaise and lemon juice, then season with salt and pepper.\r\nToast the bread, then butter it. Spoon over the prawn and egg mayonnaise, then sprinkle with some chives and serve.', 'Prawn.jpg', '2023-08-05', 'Breakfast', 5, 5, 80),
('Baked banana porridge', '2 small bananas, halved lengthways\r\n100g jumbo porridge oats\r\n¼ tsp cinnamon\r\n150ml milk of your choice, plus extra to serve\r\n4 walnuts, roughly chopped', 'Heat oven to 190C/170C fan/gas 5. Mash up one banana half, then mix it with the oats, cinnamon, milk, 300ml water and a pinch of salt, and pour into a baking dish. Top with the remaining banana halves and scatter over the walnuts.\r\nBake for 20-25 mins until the oats are creamy and have absorbed most of the liquid.', 'banana.jpg', '2023-08-02', 'breakfast', 6, 11, 50),
('Raspberry and apple smoothie', '2 apples, cored (we used Granny Smith)\r\n150g frozen raspberries\r\n150ml natural yogurt\r\n2 tbsp porridge oats\r\n½ lemon, juiced\r\n100ml milk', 'Tip all ingredients into a blender or smoothie maker and blitz until smooth, adding 50ml water or milk if it’s too thick.', 'Raspberry.jpg', '2023-07-19', 'Breakfast', 7, 3, 52),
('Blackened Chicken Cobb Salad', 'BLACKENED CHICKEN:\r\n\r\n▢3/4 teaspoon paprika.\r\n\r\n▢3/4 teaspoon chili powder.\r\n\r\n▢3/4 teaspoon garlic powder\r\n▢1/2 teaspoon sea salt\r\n▢1/4 teaspoon pepper\r\n▢Pinch of cayenne pepper\r\n▢1 Tablespoon olive oil, if needed\r\n▢1 lb boneless skinless chicken breasts, 3-4 pieces\r\nSALAD:\r\n▢12 cups baby spinach or chopped romaine\r\n▢4 large eggs, hard-boiled, peeled and sliced\r\n▢1 cup grape tomatoes, halved\r\n\r\n▢1 large cucumber, sliced\r\n▢1/2 cup diced red onion\r\n▢6 slices cooked bacon, crumbled\r\n▢1/2 cup crumbled blue cheese, optional\r\n▢1 –2 avocados, sliced\r\nRED WINE VINAIGRETTE:\r\n▢1/3 cup red wine vinegar\r\n▢1 Tablespoon Dijon mustard\r\n▢1 teaspoon maple syrup or honey\r\n▢3/4 teaspoon sea salt\r\n▢1/2 teaspoon black pepper\r\n▢1/2 cup extra virgin olive oil', 'Prepare chicken: Take chicken out of the package and pat dry with paper towels. Add spices — paprika, garlic powder, chili powder, sea salt, black pepper and cayenne pepper — in a small bowl. Coat each chicken breast with spice mixture.\r\nCook chicken: To cook the chicken, you can either grill it on an indoor or outdoor grill or sear it on the stovetop. To sear: add 1 Tablespoon olive oil to a large skillet over medium heat. Place chicken breasts in hot oil. Cook chicken about 6–7 minutes on each side, or until juices run clear. Remove chicken from skillet and let sit for 5 minutes to cool before slicing for the salad. This step can be done a day in advance.\r\nMake dressing: While the chicken cooks, make the dressing by whisking together all the ingredients in a small bowl or glass jar.\r\nAssemble salad: Divide the spinach or romaine among 4 plates (or containers if you’re making this for meal prep). Arrange equal portions of blackened chicken, hard-boiled egg, tomatoes, cucumber, red onion, avocado, bacon and blue cheese on top of the greens.\r\nAdd dressing: Just before serving, top salad with 1–2 Tablespoons of the red wine vinaigrette dressing or your favorite dressing.', 'Blackened.jpg', '2023-07-31', 'lunch', 8, 1, 200),
('Healthy Taco Salad\r\n', 'TURKEY TACO MEAT\r\n\r\n▢12 mini bell peppers\r\n▢olive or avocado oil spray\r\n▢1/2 Tablespoon olive oil\r\n▢1 lb ground turkey\r\n▢2 Tablespoons taco seasoning\r\n▢2 Tablespoons fresh salsa\r\nSALAD\r\n▢1 large head romaine lettuce, washed, rinsed, dried and chopped\r\n▢1/2 cup grape or cherry tomatoes, chopped\r\n▢1/2 cup thawed frozen sweet corn\r\n▢1/4 cup shredded Mexican cheese + more to taste\r\n▢1/2 jalapeño pepper, de-seeded and chopped (optional)\r\n\r\n▢1 avocado, chopped into chunks\r\n▢1/4 cup tortilla chips, broken into pieces\r\n▢chopped cilantro, for garnish\r\n▢hot sauce, to taste (optional)\r\n▢fresh salsa, to taste\r\nCREAMY SOUTHWEST DRESSING\r\n▢4 ounces plain Greek yogurt\r\n▢1 teaspoons lime juice\r\n▢1/8 teaspoon cumin\r\n▢1/4 teaspoon chili powder\r\n▢1/4 teaspoon garlic powder\r\n▢1/4 teaspoon salt\r\n\r\n▢1/4 teaspoon pepper\r\n▢1/4 cup fresh salsa\r\n▢2 Tablespoons fresh cilantro', 'Roast peppers: Preheat oven to 400°F. Place peppers on a baking sheet, spray with olive or avocado oil cooking spray, sprinkle on a little salt and pepper and place in the oven to roast for 20-30 minutes, or until peppers are soft. Let peppers cool, remove stems and any large seeds and then dice into small pieces. The diced up peppers should measure out to be about 1/3 cup.\r\nMake dressing: Add all ingredients for the dressing into a blender and blend until fully combined and smooth. You can also use an immersion blender for this.\r\nCook turkey: Add oil to a skillet over medium heat. Once hot, add turkey. Break meat into small pieces using a spatula or meat chopper as it cooks. Cook for about 6-8 minutes or until the turkey is no longer pink. Add taco seasoning, salsa and roasted peppers to the pan and toss to combine. Set aside.\r\nPrep salads: While the turkey it cooking start to prep your salad ingredients. To build salads, start with a base of romaine lettuce in each bowl and add the toppings — turkey taco meat, tomatoes, corn, cheese, jalapeño, avocado and chips.\r\nServe: Drizzle a little dressing over each salad and serve with chopped cilantro and extra dressing. Add some fresh salsa and a few drops of hot sauce if using. Another option is to place all the salad ingredients into a large salad bowl and toss with dressing, then portion into two-four bowls for serving.', 'Taco.jpg', '2023-07-27', 'lunch ', 9, 5, 350),
('Tofu scramble recipe', 'Prep:10 mins\r\nCook:20 mins\r\n\r\n1 tbsp olive oil\r\n1 small onion , finely sliced\r\n1 large garlic clove , crushed\r\n½ tsp turmeric\r\n1 tsp ground cumin\r\n½ tsp sweet smoked paprika\r\n280g extra firm tofu\r\n100g cherry tomatoes , halved\r\n½ small bunch parsley , chopped\r\nrye bread , to serve, (optional)', ' ***Heat the oil in a frying pan over a medium heat and gently fry the onion for 8 -10 mins or until golden brown and sticky. Stir in the garlic, turmeric, cumin and paprika and cook for 1 min.\r\n*****Roughly mash the tofu in a bowl using a fork, keeping some pieces chunky. Add to the pan and fry for 3 mins. Raise the heat, then tip in the tomatoes, cooking for 5 mins more or until they begin to soften. Fold the parsley through the mixture. Serve on its own or with toasted rye bread (not gluten-free), if you like.', 'tofu.jpg', '2023-08-09', 'Breakfast', 10, 5, 66),
('Broccoli Avocado Tuna Bowl\r\n', '2 teaspoons olive or avocado oil\r\n▢½ cup red onion, chopped\r\n▢2 5 oz cans wild caught tuna, drained (I used Wild Planet)\r\n▢3-4 cups broccoli florets, frozen or fresh\r\n▢1 avocado\r\n▢¼ cup tamari, soy sauce, or coconut aminos\r\n▢2 teaspoons roasted sunflower seeds\r\n▢regular rice or cauliflower rice, for serving\r\n▢sambal oelek or sriracha, for topping (optional)\r\n▢Salt and pepper, to taste', '1/Heat oil in a skillet over medium heat. Add onion and cook until fragrant, 3-4 minutes.\r\n2/Add broccoli florets and cook until color has brightened and they’re warm throughout.\r\n3/Add tuna, avocado and tamari/soy sauce to the skillet.\r\n4/Toss to combine and mash the avocado into the mixture a bit. Cook over medium-low heat until everything is warm.\r\n5/Serve immediately, either on its own or over rice. Top with sunflower seeds and sambal oelek or sriracha.', 'Avocado.jpg', '2023-07-11', 'dinner', 11, 3, 99),
('Yogurt Fruit Dip', '1 cup plain full-fat Greek yogurt\r\n▢1 cup whipped topping, I used Tru Whip, but you can use Cool Whip or Coco Whip\r\n▢Fruit for serving, strawberries, blueberries, grapes, pineapple, etc', 'Gently stir yogurt and whipped topping together in a mixing bowl.\r\nPlace in a serving bowl and arrange fruit all around for dipping.\r\n******Nutrition:\r\nServing: 1/6 (without fruit) | Calories: 76kcal | Carbohydrates: 5g | Protein: 3g | Fat: 5g | Saturated Fat: 4g | Cholesterol: 7mg | Sodium: 20mg | Potassium: 58mg | Sugar: 4g', 'YogurtFruit.jpg', '2023-07-10', 'desert', 12, 3, 35),
('Granola Butter', '2 cups rolled oats\r\n▢1 cup chopped nuts, I used almonds\r\n▢½ cup shredded coconut\r\n▢¼ cup maple syrup, or honey\r\n▢¼ cup melted coconut oil, or olive oil\r\n▢1 teaspoon vanilla extract\r\n▢1 teaspoon cinnamon\r\n▢¼ teaspoon sea salt\r\n▢¼ cup raisins or dried cranberries, optional', 'Preheat your oven to 350°F. Line a baking sheet with parchment paper.\r\n\r\nIn a large mixing bowl, combine the oats, chopped nuts and shredded coconut.\r\nIn a separate mixing bowl, whisk together the honey or maple syrup, melted coconut oil, vanilla extract and salt.\r\nPour the wet ingredients over the dry ingredients and mix until well combined.\r\nSpread the mixture evenly onto the prepared baking sheet. Bake for 15-20 minutes, or until the granola is golden brown and fragrant, stirring occasionally. Remove the granola from the oven and let it cool completely.\r\nOnce cooled, transfer the granola to a food processor or blender. Pulse until the granola becomes a butter consistency, about 15-20 minutes, stopping to scrape the sides down and give the food processor a break every so often.\r\nStir in the raisins or dried cranberries, if using.\r\nStore the granola butter in an airtight container in the refrigerator for up to 2 weeks.\r\n************Nutrition\r\nServing: 2 Tablespoons | Calories: 135kcal | Carbohydrates: 13g | Protein: 3g | Fat: 9g | Saturated Fat: 5g | Polyunsaturated Fat: 1g | Monounsaturated Fat: 2g | Sodium: 38mg | Potassium: 58mg | Fiber: 2g | Sugar: 4g', 'Granola.jpg', '2023-08-01', 'desert', 13, 5, 90);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `USENAME` varchar(255) DEFAULT NULL,
  `PASSWORD` text NOT NULL,
  `Email` varchar(250) DEFAULT NULL,
  `IDUSER` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`USENAME`, `PASSWORD`, `Email`, `IDUSER`) VALUES
('Yassminebenn', 'yassmine', 'yassmine@gmail.com', 1),
('aya', 'aya', 'ayabennouiri123@gmail.com\r\n', 3),
('Karima', 'karima', 'karimasimo@gmail.com', 5),
('ikram ', 'ikram', 'ikram@gmail.com', 11),
('salma', 'salma', 'salma@gmail.com', 12);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD KEY `fk_fav` (`IDUSER`),
  ADD KEY `fk_fav2` (`IDRECIPE`);

--
-- Indexes for table `preference`
--
ALTER TABLE `preference`
  ADD PRIMARY KEY (`IDPREFERENCE`(255));

--
-- Indexes for table `recipe`
--
ALTER TABLE `recipe`
  ADD PRIMARY KEY (`IDRECIPE`),
  ADD KEY `fk_USER` (`IDUSER`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`IDUSER`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `recipe`
--
ALTER TABLE `recipe`
  MODIFY `IDRECIPE` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `IDUSER` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `favorites`
--
ALTER TABLE `favorites`
  ADD CONSTRAINT `fk_fav` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`),
  ADD CONSTRAINT `fk_fav2` FOREIGN KEY (`IDRECIPE`) REFERENCES `recipe` (`IDRECIPE`);

--
-- Constraints for table `recipe`
--
ALTER TABLE `recipe`
  ADD CONSTRAINT `fk_USER` FOREIGN KEY (`IDUSER`) REFERENCES `user` (`IDUSER`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
