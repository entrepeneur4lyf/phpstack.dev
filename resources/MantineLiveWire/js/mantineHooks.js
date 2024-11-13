import { 
    useCallbackRef,
    useClickOutside,
    useFormErrors,
    useFormList,
    useFormStatus,
    useFormValues,
    useFormWatch,
    useClipboard,
    useColorScheme,
    useCounter,
    useDebounceCallback,
    useDebounceState,
    useDebounceValue,
    useDidUpdate,
    useDisclosure,
    useDocumentTitle,
    useDocumentVisibility,
    useElementSize,
    useEventListener,
    useEyeDropper,
    useFavicon,
    useFetch,
    useFocusReturn,
    useFocusTrap,
    useFocusWithin,
    useForceUpdate,
    useFullscreen,
    useHash,
    useHeadroom,
    useHotkeys,
    useHover,
    useId,
    useIdle,
    useIntersection,
    useInViewport,
    useInterval,
    useIsFirstRender,
    useListState,
    useLocalStorage,
    useLogger,
    useMap,
    useMediaQuery,
    useMergedRef,
    useMounted,
    useMouse,
    useMove,
    useMutationObserver,
    useNetwork,
    useOrientation,
    useOs,
    usePageLeave,
    usePagination,
    usePrevious,
    useQueue,
    useReducedMotion,
    useResizeObserver,
    useScrollIntoView,
    useSessionStorage,
    useSet,
    useSetState,
    useShallowEffect,
    useStateHistory,
    useTextSelection,
    useThrottledCallback,
    useThrottledState,
    useThrottledValue,
    useTimeout,
    useToggle,
    useUncontrolled,
    useValidatedState,
    useViewportSize,
    useWindowEvent,
    useWindowScroll
} from '@mantine/hooks';

const MANTINE_HOOKS = {
    callbackRef: useCallbackRef,
    clickOutside: useClickOutside,
    formErrors: useFormErrors,
    formList: useFormList,
    formStatus: useFormStatus,
    formValues: useFormValues,
    formWatch: useFormWatch,
    clipboard: useClipboard,
    colorScheme: useColorScheme,
    counter: useCounter,
    debounceCallback: useDebounceCallback,
    debounceState: useDebounceState,
    debounceValue: useDebounceValue,
    didUpdate: useDidUpdate,
    disclosure: useDisclosure,
    documentTitle: useDocumentTitle,
    documentVisibility: useDocumentVisibility,
    elementSize: useElementSize,
    eventListener: useEventListener,
    eyeDropper: useEyeDropper,
    favicon: useFavicon,
    fetch: useFetch,
    focusReturn: useFocusReturn,
    focusTrap: useFocusTrap,
    focusWithin: useFocusWithin,
    forceUpdate: useForceUpdate,
    fullscreen: useFullscreen,
    hash: useHash,
    headroom: useHeadroom,
    hotkeys: useHotkeys,
    hover: useHover,
    id: useId,
    idle: useIdle,
    intersection: useIntersection,
    inViewport: useInViewport,
    interval: useInterval,
    isFirstRender: useIsFirstRender,
    listState: useListState,
    localStorage: useLocalStorage,
    logger: useLogger,
    map: useMap,
    mediaQuery: useMediaQuery,
    mergedRef: useMergedRef,
    mounted: useMounted,
    mouse: useMouse,
    move: useMove,
    mutationObserver: useMutationObserver,
    network: useNetwork,
    orientation: useOrientation,
    os: useOs,
    pageLeave: usePageLeave,
    pagination: usePagination,
    previous: usePrevious,
    queue: useQueue,
    reducedMotion: useReducedMotion,
    resizeObserver: useResizeObserver,
    scrollIntoView: useScrollIntoView,
    sessionStorage: useSessionStorage,
    set: useSet,
    setState: useSetState,
    shallowEffect: useShallowEffect,
    stateHistory: useStateHistory,
    textSelection: useTextSelection,
    throttledCallback: useThrottledCallback,
    throttledState: useThrottledState,
    throttledValue: useThrottledValue,
    timeout: useTimeout,
    toggle: useToggle,
    uncontrolled: useUncontrolled,
    validatedState: useValidatedState,
    viewportSize: useViewportSize,
    windowEvent: useWindowEvent,
    windowScroll: useWindowScroll
};

// Initialize hooks when requested
document.addEventListener('mantine-init-hooks', (event) => {
    const { hooks, configs } = event.detail;
    const component = window.Livewire.find(event.target.closest('[wire\\:id]').getAttribute('wire:id'));

    hooks.forEach(hookName => {
        setupMantineHook(hookName, event.target, component);
    });
});

// Cleanup hooks when requested
document.addEventListener('mantine-destroy-hooks', (event) => {
    const el = event.target;
    if (activeHooks.has(el)) {
        const cleanup = activeHooks.get(el);
        cleanup?.();
        activeHooks.delete(el);
    }
});

// Track active hooks for cleanup
const activeHooks = new Map();

export function setupMantineHook(hookName, el, component) {
    // Cleanup any existing hook
    if (activeHooks.has(el)) {
        const cleanup = activeHooks.get(el);
        cleanup?.();
        activeHooks.delete(el);
    }
    if (!MANTINE_HOOKS[hookName]) {
        console.warn(`Mantine hook '${hookName}' not found`);
        return;
    }

    const hookConfig = component.get('mantineHookConfigs')[hookName] || {};
    const { handler: handlerName, ...config } = hookConfig;
    
    // Set up the handler if specified
    const handler = handlerName 
        ? (...args) => component.call(handlerName, ...args)
        : undefined;

    // Apply the hook with configuration and handler
    const hookResult = MANTINE_HOOKS[hookName](config, handler);

    // Store cleanup function if returned
    if (typeof hookResult === 'function') {
        activeHooks.set(el, hookResult);
    }

    return hookResult;
}
