using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.SceneManagement;
using UnityEngine.UI;

public class MainMenu : MonoBehaviour
{
    public Text PlayerDisplay;

    void Start()
    {
        if (DBManager.LoggedIn)
        {
            PlayerDisplay.text = "Player: " + DBManager.username;
        }
    }

    public void GoToRegister()
    {
        SceneManager.LoadScene(1);
    }

    public void GoToLogin()
    {
        SceneManager.LoadScene(2);
    }
}
