#include <stdio.h>

#define X 4
#define Y 3

/* function: average
 * calculate average from sum marks for one student
 * parameters : int sum
 * return: float
*/
float average(int sum) {
    return (float)sum/X;
}

/* function: marksManagement
 * manage student's marks
 * parameters : none
 * return: int
*/
int marksManagement() {
    // variables initialization
    float averages[Y];
    int marks[Y][X], countTab, k,m,temp, sums[Y], lowerThan = 100, greaterThan = 0, input, sum = 0, i, j, sumMarks = 0;

    // populate variables for app
    printf("Prémière étape : Saisie des notes des élèves \n");
    for(i = 0; i < Y; i++) {
        printf("Saisir les notes de l'élève %d : \n", i+1);
        for (j = 0; j < X; j++) {

            // marks
            printf("Note %d : ", j+1);

            if(scanf("%d", &input)!=1) {
                printf("Il faut rentrer un nombre\n");
                return 0;
            }

            if(input>20) {
                printf("Impossible de rentrer une note supérieure à 20\n");
                return 0;
            }

            marks[i][j] = input;

            // ----

            // add marks for sum
            sum += input;

            // lower and greater marks
            if (input > greaterThan) {
                greaterThan = input;
            } else if (input < lowerThan) {
                lowerThan = input;
            }

        }

        // class marks sum
        sumMarks += sum;

        // students sums
        sums[i] = sum;

        // students averages
        averages[i] = average(sum);

        sum = 0;

    }

    for(countTab = 0; countTab < Y; countTab++) {
        for(k=1; k<X; k++) {
            for(m=0; m<X-1; m++) {
                // switch places for 2 marks in student mark array
                if(marks[countTab][m] > marks[countTab][m+1]) {
                    temp = marks[countTab][m];
                    marks[countTab][m] = marks[countTab][m+1];
                    marks[countTab][m+1] = temp;
                }
            }
        }
    }

    // choice the action
    int choice;
    do {

        printf("Menu : \n");
        printf(" 0 - Arrêt du programme \n");
        printf(" 1 - Récupérer la somme des notes des élèves \n");
        printf(" 2 - Récupérer les moyennes des élèves \n");
        printf(" 3 - Récupérer la note la + petite et la + grande \n");
        printf(" 4 - Afficher les notes \n");
        printf("Votre choix : ");
        if(scanf("%d", &choice)!=1) {
            printf("Choix non valide, retour à l'accueil \n");
            return 0;
        }

        switch(choice) {
            case 1:
                // display marks sums of students and class
                for(i = 0; i < Y; i++){
                    printf("Somme des notes de l'élève %d : %d \n", i + 1, sums[i]);
                }
                printf("Somme des notes de la classe : %d \n", sumMarks);
                break;
            case 2:
                // display averages of students and class
                for(i = 0; i < Y; i++){
                    printf("Moyenne de l'élève %d : %0.2f \n", i + 1, averages[i]);
                }
                printf("Moyenne des notes de la classe : %0.2f \n", (float) sumMarks / (Y*X));
                break;
            case 3:
                // display lower and greater marks
                printf("Note la plus petite : %d \n", lowerThan);
                printf("Note la plus grande : %d \n", greaterThan);
                break;
            case 4:
                // display all marks
                for(i = 0; i < Y; i++) {
                    printf("Notes de l'élève %d : ", i+1);
                    for (j = 0; j < X; j++) {
                        printf("%d", marks[i][j]);
                        if(j!=X-1) {
                            printf(", ");
                        } else {
                            printf("\n");
                        }
                    }
                }
                break;
            default:
                break;
        }

    } while(choice!=0);

    return 0;
}

/* function: currencyConvert
 * converter for usd to euro or euro to usd
 * parameters : none
 * return: int
*/
int currencyConvert() {
    int choice, base;
    double rate;
    do {

        printf("Menu : \n");
        printf(" 0 - Arrêt du programme \n");
        printf(" 1 - Conversion € en USD \n");
        printf(" 2 - Conversion USD en € \n");
        printf("Votre choix : ");
        if(scanf("%d", &choice)!=1) {
            printf("Choix non valide, arrêt du programme \n");
            return 0;
        }

        printf("Entrez le nombre à convertir\n");
        if(scanf("%d", &base)!=1) {
            printf("Entrée non valide, arrêt du programme \n");
            return 0;
        }

        switch(choice) {
            case 1:
                rate = 1.06;
                printf("%d en € équivaut à %.2f en USD \n", base, (float)base*rate);
                break;
            case 2:
                rate = 0.94;
                printf("%d en USD équivaut à %.2f en € \n", base, (float)base*rate);
                break;
            default:
                break;
        }

    } while(choice!=0);

    return 0;
}

/* function: salaryConvert
 * converter for net to gross or gross to net
 * parameters : none
 * return: int
*/
int salaryConvert() {
    int choice, base;
    double rate;
    do {

        printf("Menu : \n");
        printf(" 0 - Arrêt du programme \n");
        printf(" 1 - Conversion brut en net \n");
        printf(" 2 - Conversion net en brut \n");
        printf("Votre choix : ");
        if(scanf("%d", &choice)!=1) {
            printf("Choix non valide, arrêt du programme \n");
            return 0;
        }
        printf("Entrez le nombre à convertir\n");
        if(scanf("%d", &base)!=1) {
            printf("Entrée non valide, arrêt du programme \n");
            return 0;
        }
        switch(choice) {
            case 1:
                rate = 0.75;
                printf("%d en brut équivaut à %.2f en net \n", base, (float)base*rate);
                break;
            case 2:
                rate = 1.25;
                printf("%d en net équivaut à %.2f en brut \n", base, (float)base*rate);
                break;
            default:
                break;
        }

    } while(choice!=0);

    return 0;
}

/* function: currencyConvert
 * menu to chose what function to launch
 * parameters : int argc and char *argv[]
 * return: int
*/
int main(){
    int mainChoice;
    do {

        printf("Menu : \n");
        printf(" 0 - Arrêt du programme \n");
        printf(" 1 - Gestion des notes des élèves \n");
        printf(" 2 - Conversion de salaire \n");
        printf(" 3 - Conversion de devises \n");
        printf("Votre choix : ");
        if(scanf("%d", &mainChoice)!=1) {
            printf("Choix non valide, arrêt du programme \n");
            return 0;
        }

        switch(mainChoice) {
            case 1:
                marksManagement();
                break;
            case 2:
                salaryConvert();
                break;
            case 3:
                currencyConvert();
                break;
            default:
                break;
        }

    } while(mainChoice!=0);

    return 0;
}