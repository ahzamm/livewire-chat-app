<div>
    <!-- Sent Voice Message Component with Audio Playback -->
    <!--
     This component creates a WhatsApp-like voice message bubble for sent messages.
     It uses Alpine.js for interactive elements like play/pause, progress tracking,
     and duration display, connected to an actual HTML5 Audio element.

     Props:
     - $sentAt: The timestamp of when the message was sent (e.g., '10:30 AM').
     - $audioUrl: The URL to the voice message audio file.
                  (For this example, a sample URL is hardcoded. In a real app, pass this as a prop.)
 -->
    <div class="flex justify-end mb-2">
        <div class="relative rounded-lg py-2 px-3 flex items-center space-x-2 pr-12" style="background-color: #E2F7CB; min-width: 220px; max-width: 320px;" x-data="{
            isPlaying: false,
            progress: 0,
            currentTime: '00:00',
            totalDuration: '00:00',
            audio: null,
            // Sample audio URL - REPLACE THIS WITH YOUR ACTUAL AUDIO URL PROP
            audioSource: 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
        
            // Initialize the audio player when the component is ready
            init() {
                this.audio = new Audio(this.audioSource);
        
                // Event listener for updating the progress bar and current time display
                this.audio.addEventListener('timeupdate', () => {
                    if (this.audio.duration > 0) {
                        this.progress = (this.audio.currentTime / this.audio.duration) * 100;
                        this.currentTime = this.formatTime(this.audio.currentTime);
                    }
                });
        
                // Event listener for when the audio finishes playing
                this.audio.addEventListener('ended', () => {
                    this.isPlaying = false;
                    this.progress = 0;
                    this.currentTime = '00:00'; // Reset current time
                    this.audio.currentTime = 0; // Reset audio to start for replay
                });
        
                // Event listener for when audio metadata is loaded (to get total duration)
                this.audio.addEventListener('loadedmetadata', () => {
                    this.totalDuration = this.formatTime(this.audio.duration);
                    this.currentTime = this.formatTime(0); // Initialize current time
                });
        
                // Handle potential errors during audio loading
                this.audio.addEventListener('error', (e) => {
                    console.error('Audio loading error:', e);
                    this.currentTime = 'Error';
                    this.totalDuration = 'Error';
                });
            },
            // Toggle play/pause functionality
            togglePlayPause() {
                if (this.audio) {
                    if (this.isPlaying) {
                        this.audio.pause();
                    } else {
                        this.audio.play().catch(error => {
                            console.error('Audio play failed:', error);
                            // This often happens if the user hasn't interacted with the page yet.
                            // You might want to show a message to the user here.
                        });
                    }
                    this.isPlaying = !this.isPlaying;
                }
            },
            // Format time from seconds to MM:SS
            formatTime(seconds) {
                if (isNaN(seconds)) return '00:00';
                const minutes = Math.floor(seconds / 60);
                const remainingSeconds = Math.floor(seconds % 60);
                return `${String(minutes).padStart(2, '0')}:${String(remainingSeconds).padStart(2, '0')}`;
            }
        }">
            <!-- Play/Pause Button -->
            <button @click="togglePlayPause()" class="focus:outline-none p-1 rounded-full bg-white shadow-sm flex-shrink-0">
                <template x-if="!isPlaying">
                    <!-- Play Icon (SVG) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M14.752 11.168l-3.197 2.132A1 1 0 0110 13.132V10.868a1 1 0 011.555-.832l3.197 2.132a1 1 0 010 1.664z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </template>
                <template x-if="isPlaying">
                    <!-- Pause Icon (SVG) -->
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-gray-700" fill="currentColor" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 9v6m4-6v6m7-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </template>
            </button>

            <!-- Progress Bar and Duration -->
            <div class="flex-grow flex flex-col justify-center ml-2 mr-2">
                <!-- Progress bar container -->
                <div class="relative h-1.5 bg-gray-300 rounded-full overflow-hidden">
                    <!-- Actual progress -->
                    <div class="h-full bg-green-500 rounded-full transition-all duration-100 ease-linear" :style="`width: ${progress}%`"></div>
                    <!-- Simple waveform representation (static for visual effect) -->
                    <div class="absolute inset-0 flex items-center justify-between px-1 opacity-50">
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-3 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-2.5 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-1 bg-gray-600 rounded-full"></div>
                        <div class="w-0.5 h-3 bg-gray-600 rounded-full"></div>
                    </div>
                </div>
                <!-- Current Time / Total Duration -->
                <div class="flex justify-between text-xs text-gray-600 mt-1">
                    <span x-text="currentTime">00:00</span>
                    <span x-text="totalDuration">00:00</span>
                </div>
            </div>

            <!-- Sent At Timestamp (positioned absolutely within the bubble) -->
            <p class="text-right text-xs text-gray-500 absolute bottom-1 right-2">
                {{-- {{ $sentAt }} --}}
            </p>
        </div>
    </div>

</div>
