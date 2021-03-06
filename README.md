
## <span style='color:orange'>Making Global Wrapper Livewire Classes</span>

- using [AlpineJS](https://alpinejs.dev/)
- using [TailwindCSS](https://tailwindcss.com/)
- using [Laravel Livewire](https://laravel-livewire.com/)

### <span style='color:green'>Challenge 1</span>
Have one tag form and one component form, and then serve these up
in the appropriate user experience - for mobile, modal forms suck, especially if
using fixed positioning, while on desktop they look quite snazzy.  

### <span style='color:green'>Challenge 2</span>
I don't want to add every modal livewire component to 
my layouts.app file.  I want to have one modal component that I can inject whatever
form I want into as needed.  That way i have less duplication of code, and a consisten
user experience re: modal positioning, animations, etc.

### <span style='color:green'>Challenge 3</span>
If a form is opened as a full component, it needs to 
navigate back to the index view, while in a modal, it just needs to hide the
modal.  So I need a 'full page' component where I can also dynamically inject 
whatever livewire component I want into.

### <span style='color:green'>Challenge 4</span>
When in full page component mode, navigating back will
automatically have the index view refresh, but in modal mode, it won't, so 
need some standardized practice to trigger a refresh on modal hide.

## Tech used
- Livewire emit and emitTo
- Livewire $refresh
- Tailwind hidden and block, flex-grow and flex-shrink, among others
- Alpine JS for hiding/showing of modals
- Alpine $watch - super handy!
- Alpine x-cloak - stops weird stuff from happening
- Anonymous Blade Components
- Alpine transitions, entangles combined with Components
- Eloquent model default values 

## Features
- minimalist tag search, tag results cloud
- tag cloud select
- injecting components at runtime into livewire component "wrappers"

## Helpful Links:
- [Creating a modal dialog with Alpine.js](https://w3collective.com/modal-dialog-alpine-js/)
- [Deep dive into Laravel Livewire](https://blog.logrocket.com/deep-dive-into-laravel-livewire/)
