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
                primary: "#161D6F",
                // primary: "#13242C",
                secondary: "#123685",
                pink: "#D95975",
                white: "#FFFFFF",
                // gray: "#999999",
                dblue: "#233A85",
                // gray: "#F5F5F5",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
