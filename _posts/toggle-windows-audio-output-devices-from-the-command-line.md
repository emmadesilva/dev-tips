---
title: 'Toggle Windows audio output devices from the command line'
description: 'How to toggle between two Windows audio output devices using a PowerShell script and the AudioDeviceCmdlets module.'
author: emma
date: '2024-07-01 10:00'
---

## Toggle between Windows audio output devices from the command line!

Here's a simple PowerShell script to toggle between two Windows audio output devices using the AudioDeviceCmdlets module. This script can be run from the command line or even bound as a macro to your keyboard for quick switching.

The full GitHub project is at https://github.com/emmadesilva/WindowsToggleAudioDevice

### Installation

#### Install [`AudioDeviceCmdlets`](https://github.com/frgnca/AudioDeviceCmdlets) Module

1. **Open PowerShell as Administrator**:
   - Press `Win + X` and select `Windows PowerShell (Admin)` or search for PowerShell in the Start menu and right-click to run it as administrator.

2. **Install the Module**:
   ```powershell
   Install-Module -Name AudioDeviceCmdlets -Repository PSGallery -Force
   ```

#### List All Audio Devices

1. **List Audio Devices**:
   ```powershell
   Import-Module AudioDeviceCmdlets
   Get-AudioDevice -List
   ```

This command will list all audio devices with their IDs and names. Take note of the `Index` values as you will need them later.

### Download `ToggleAudioDevice.ps1`

Next, download the `ToggleAudioDevice.ps1` file from [GitHub](https://github.com/emmadesilva/WindowsToggleAudioDevice), preferably into your `$PATH`.

You can also just copy the following file contents, just note that it may not be up to date!

```powershell
# https://github.com/emmadesilva/WindowsToggleAudioDevice/blob/master/ToggleAudioDevice.ps1

Import-Module AudioDeviceCmdlets

# Define the indices of your devices
$device1Index = 3
$device2Index = 4

# Get the current default audio playback device index
$currentDeviceIndex = (Get-AudioDevice -Playback | Where-Object { $_.Default -eq "True" }).Index

Write-Host "Current device index: $currentDeviceIndex"

# Function to set the default audio playback device by index
function Set-DefaultAudioDeviceByIndex {
    param (
        [int]$deviceIndex
    )

    Set-AudioDevice -Index $deviceIndex
    Write-Host "Switched to device index $deviceIndex."
}

# Toggle the default audio playback device
if ($currentDeviceIndex -eq $device1Index) {
    Set-DefaultAudioDeviceByIndex -deviceIndex $device2Index
} else {
    Set-DefaultAudioDeviceByIndex -deviceIndex $device1Index
}
```

### Configure `ToggleAudioDevice.ps1`

Now, open the `ToggleAudioDevice.ps1` file and define the speaker indices found in the list above.

```powershell
# Define the indices of your devices
$device1Index = 3 # Headphones
$device2Index = 4 # Speakers
```

### Usage

Now you can run the `.\ToggleAudioDevice.ps1` script from PowerShell, and even bind it as a macro to your keyboard!

---

This PowerShell script provides a quick and easy way to toggle between your preferred audio devices. Make sure to adjust the device indices in the script to match your specific setup, and you'll be switching audio outputs in no time!
