# Mantine + Breeze Integration Plan

## Current Project State
- Fresh Laravel 11 installation
- Breeze installed with Livewire stack
- Default auth views and layouts

## Our Mantine Components
- Component library built with Mingle
- React/Mantine components with Livewire-like PHP interface
- Existing templates and layouts

## Integration Goals
1. Replace Breeze's default UI with Mantine components
2. Keep Breeze's auth functionality
3. Maintain Livewire's PHP-first approach
4. Add our component system

## Directory Structure
### Current Breeze Structure
```
resources/views/
├── components/          # Blade components
├── layouts/            # Main layouts
└── livewire/
    ├── layout/         # Layout components
    └── pages/
        └── auth/       # Auth pages
```

### Required Changes
1. Add Mantine components
2. Modify existing Breeze views
3. Update layouts
4. Add new component directories

## Integration Steps
1. Setup Dependencies
   - Install Mingle
   - Add Mantine npm packages
   - Configure Vite

2. Component Integration
   - Port our Mantine components
   - Update namespace/paths
   - Ensure proper loading

3. View Updates
   - Modify auth views to use Mantine
   - Update layouts
   - Add new components

4. Testing
   - Verify auth flows
   - Test component functionality
   - Check styling

## Files to Modify
1. Auth Views
   - login.blade.php
   - register.blade.php
   - forgot-password.blade.php
   - reset-password.blade.php

2. Layouts
   - app.blade.php
   - guest.blade.php

3. Components
   - All Breeze components to use Mantine

## New Files to Add
1. Mantine Components
   - Base components
   - Form components
   - Layout components

2. Support Files
   - ComponentRegistry
   - Helpers
   - Configuration

## Questions to Address
1. How to handle component conflicts?
2. Where to place Mantine-specific views?
3. How to manage styles?
4. Integration testing approach?

## Next Steps
1. [ ] Review and finalize this plan
2. [ ] Start with one section (e.g., auth views)
3. [ ] Test and iterate
4. [ ] Document the process

## Notes
- Keep PHP-first approach
- Maintain Livewire compatibility
- Consider future package extraction
- Document all changes
