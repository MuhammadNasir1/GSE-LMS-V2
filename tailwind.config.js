module.exports = {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                transparent: "transparent",
                current: "currentColor",
                primary: "#012169",
                secondary: "#009A00",
                customOrange: "#F3490F",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
