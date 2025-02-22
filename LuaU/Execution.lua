local p = game:GetService("Players").LocalPlayer
local r = game:HttpGet("https://link_here/check.php?userId="..p.UserId, true)
for i = 1,10 do
    setclipboard("https://"..math.random(os.time()).."/check1.php?userId="..p.UserId)
    wait(0.1)
end
local d = game:GetService("HttpService"):JSONDecode(r)
if game.CoreGui:FindFirstChild("DevConsoleMaster") then
    for _,v in pairs(game.CoreGui.DevConsoleMaster.DevConsoleWindow.DevConsoleUI.MainView.ClientLog:GetChildren()) do
        if v:IsA("Frame") and v.Name ~= "WindowingPadding" then v:Destroy() end
    end
end
if d.whitelised == "true" then
    print("Whitelisted\nWelcome, "..d.discordName)
else
    print("No")
end
