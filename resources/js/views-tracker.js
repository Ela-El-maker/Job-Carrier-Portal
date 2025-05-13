export function trackView(type, id) {
    const storageKey = `viewed_${type}_${id}`;

    // Skip if already tracked in this session
    if (sessionStorage.getItem(storageKey)) {
        return;
    }

    fetch('/api/track-view', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            'Accept': 'application/json'
        },
        body: JSON.stringify({ type, id })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            sessionStorage.setItem(storageKey, 'true');
        }
    })
    .catch(error => console.error('Error tracking view:', error));
}
