<?php

namespace MantineLivewire\Traits;

trait WithMantineHooks
{
    protected array $onMantineMount = [];
    protected array $onMantineUnmount = [];
    protected array $onMantineUpdate = [];
    protected array $onMantineError = [];
    protected array $onMantineStateChange = [];

    /**
     * Register a hook to be called when the Mantine component mounts
     */
    public function onMantineMount(callable $callback): self
    {
        $this->onMantineMount[] = $callback;
        return $this;
    }

    /**
     * Register a hook to be called when the Mantine component unmounts
     */
    public function onMantineUnmount(callable $callback): self
    {
        $this->onMantineUnmount[] = $callback;
        return $this;
    }

    /**
     * Register a hook to be called when the Mantine component updates
     */
    public function onMantineUpdate(callable $callback): self
    {
        $this->onMantineUpdate[] = $callback;
        return $this;
    }

    /**
     * Register a hook to be called when the Mantine component encounters an error
     */
    public function onMantineError(callable $callback): self
    {
        $this->onMantineError[] = $callback;
        return $this;
    }

    /**
     * Register a hook to be called when the Mantine component's state changes
     */
    public function onMantineStateChange(callable $callback): self
    {
        $this->onMantineStateChange[] = $callback;
        return $this;
    }

    /**
     * Execute Mantine hooks for a given lifecycle event
     */
    protected array $mantineHooks = [];
    protected array $mantineHookConfigs = [];

    protected function executeMantineHooks(string $type, mixed ...$args): void
    {
        $hooks = $this->{"onMantine{$type}"} ?? [];
        foreach ($hooks as $hook) {
            if (is_callable($hook)) {
                $hook($this, ...$args);
            }
        }
    }

    /**
     * Register a Mantine hook with configuration
     */
    protected function registerHook(string $hookName, array $config = [], ?string $handler = null): void
    {
        $this->mantineHooks[$hookName] = true;
        $this->mantineHookConfigs[$hookName] = array_merge(
            $config,
            $handler ? ['handler' => $handler] : []
        );
    }

    /**
     * Register a generic Mantine hook handler
     */
    public function useHook(string $hookName, ?array $config = null, ?callable $handler = null): self
    {
        if ($handler) {
            $handlerName = 'handle' . ucfirst($hookName);
            $this->{$handlerName} = $handler;
        }
        
        $this->registerHook($hookName, $config ?? [], $handler ? $handlerName : null);
        return $this;
    }

    /**
     * Initialize all registered Mantine hooks
     */
    public function mountMantineHooks(): void
    {
        if (!empty($this->mantineHooks)) {
            $this->dispatchBrowserEvent('mantine-init-hooks', [
                'hooks' => array_keys($this->mantineHooks),
                'configs' => $this->mantineHookConfigs
            ]);
        }
    }

    /**
     * Boot the trait
     */
    public function bootWithMantineHooks(): void
    {
        $this->mantineHooks = [];
        $this->mantineHookConfigs = [];

        // Initialize hooks after component mount
        $this->onMantineMount(function() {
            $this->mountMantineHooks();
        });

        // Cleanup hooks before component unmount
        $this->onMantineUnmount(function() {
            $this->destroyMantineHooks();
        });
    }

    /**
     * Cleanup hooks on component destroy
     */
    public function destroyMantineHooks(): void
    {
        $this->dispatchBrowserEvent('mantine-destroy-hooks');
    }

    /**
     * Get configuration for a specific hook
     */
    public function getHookConfig(string $hookName): ?array
    {
        return $this->mantineHooks[$hookName] ?? null;
    }
}
