import discord
from discord import app_commands
from discord.ext import commands
import aiohttp

token = "" #token
intents = discord.Intents.default()
bot = commands.Bot(command_prefix="!", intents=intents, help_command=None)

@bot.event
async def on_ready():
    print("-----------------")
    print(f"Bot: {bot.user}")
    print(f"ID: {bot.user.id}")
    synced = await bot.tree.sync()
    print(f"Synced: {len(synced)} commands.")
    print("-----------------")

@bot.tree.command(name="whitelist", description="Register your Discord account")
async def whitelist(interaction: discord.Interaction, roblox: str):
    url = f"https://link_here/whitelist.php?discordName={interaction.user.display_name}&discordID={interaction.user.id}&userId={roblox}"
    async with aiohttp.ClientSession() as session:
        async with session.get(url) as resp:
            if resp.status != 200:
                await interaction.response.send_message("Error registering", ephemeral=True)
                return
    await interaction.response.send_message("Registered!", ephemeral=True)

bot.run(token)
