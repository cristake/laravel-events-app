module.exports = {
    theme: {
        extend: {
            width: {
                "96": "24rem"
            },
            inset: {
                "16": "4rem"
            }
        },
        spinner: () => ({
            default: {
                color: "#dae1e7",
                size: "1em",
                border: "2px",
                speed: "500ms"
            }
        }),
        gradients: theme => ({
            "gradient-blue": [
                "30deg",
                theme("colors.blue.800"),
                theme("colors.blue.900")
            ]
        })
    },
    variants: {
        spinner: ["responsive"],
        gradients: ["responsive", "hover"]
    },
    plugins: [
        require("tailwindcss-spinner")(),
        require("tailwindcss-plugins/gradients")
    ]
};
