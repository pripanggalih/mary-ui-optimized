<p align="center"><img width="200" src="https://github.com/robsontenorio/mary-ui.com/blob/main/public/mary.png?raw=true"></p>

<p align="center">
    <a href="https://packagist.org/packages/pripanggalih/mary-ui-optimized">
        <img src="https://img.shields.io/packagist/dt/pripanggalih/mary-ui-optimized?cacheSeconds=60">
    </a>
    <a href="https://packagist.org/packages/pripanggalih/mary-ui-optimized">
        <img src="https://img.shields.io/packagist/v/pripanggalih/mary-ui-optimized?label=stable&color=blue&cacheSeconds=60">
    </a>
    <a href="https://packagist.org/packages/pripanggalih/mary-ui-optimized">
        <img src="https://poser.pugx.org/pripanggalih/mary-ui-optimized/license.svg">
    </a>
</p>

## Introduction

The maryUI Optimized package is a performance-enhanced version of Mary UI components for Livewire, powered by daisyUI and Tailwind. This optimized version features faster component initialization and improved UUID generation for better performance.

## Performance Optimizations

-   **Faster UUID Generation**: Replaced expensive MD5 hashing with simple counter-based UUIDs
-   **Improved Component Initialization**: Streamlined component constructor logic
-   **Reduced Memory Usage**: Eliminated unnecessary serialization operations

## Official Documentation

You can read the official documentation on the [maryUI website](https://mary-ui.com).

## Sponsor

Let's keep pushing it, [sponsor me](https://github.com/sponsors/robsontenorio) ❤️

## Discord

Come to say hello on [maryUI Discord](https://discord.gg/c2Dv8T2X2s)

## Credits

**Original Mary UI**: [@robsontenorio](https://twitter.com/robsontenorio)  
**Performance Optimizations**: MW Pripanggalih ([@pripanggalih](https://github.com/pripanggalih))

## Contributing

Clone the optimized repository into some folder **inside your app**.

```bash
git clone git@github.com:pripanggalih/mary-ui-optimized.git
```

Change `composer.json` from **your app**

<!-- @formatter:off -->

```json
"minimum-stability": "dev", // <- change to "dev"

// Add this
"repositories": {
    "pripanggalih/mary-ui-optimized": {
        "type": "path",
        "url": "/path/to/mary-ui-optimized", // <- change the path
        "options": {
          "symlink": true
        }
    }
}
```

<!-- @formatter:on -->

Require the optimized package for local symlink.

```bash
composer require pripanggalih/mary-ui-optimized
```

Start the dev server.

```bash
npm run dev
```

## License

<a name="license"></a>

MaryUI is open-sourced software licensed under the [MIT license](/license.md).
