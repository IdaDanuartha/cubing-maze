<template>
  <div class="grid grid-cols-12 gap-10">
    <div class="xl:col-span-8 lg:col-span-7 col-span-12 lg:order-1 order-2">
      <div class="bg-white shadow-lg p-[30px] rounded">
        <div class="border-b border-secondary-color/30 pb-5 mb-5">
          <h3 class="text-secondary-color font-worksans-bold text-[18px]">
            Description
          </h3>
        </div>
        <div v-html="competition.description"></div>
      </div>
    </div>
    <div class="xl:col-span-4 lg:col-span-5 col-span-12 lg:order-2 order-1">
      <div class="bg-white shadow-lg p-[30px] rounded">
        <div class="border-b border-secondary-color/50 pb-5 mb-5">
          <img
            :src="`/storage/${competition.competition_img}`"
            class="rounded"
            alt="competition cover image"
          />
        </div>
        <div class="flex mb-4">
          <p>Competition Name :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.name }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Competition Date :</p>
          <p class="font-worksans-semibold ml-1">
            {{
              competitionDateFormat(
                competition.date_start,
                competition.date_end
              )
            }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Competitor Limit :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.competitor_limit }} Competitors
          </p>
        </div>
        <div class="flex mb-4">
          <p>Type :</p>
          <p class="font-worksans-semibold capitalize ml-1">
            {{ competition.type }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Registration Fee :</p>
          <p class="font-worksans-semibold ml-1">
            Rp. {{ rupiah_format(competition.fee) + ",00" ?? "0,00" }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Using Password :</p>
          <p class="font-worksans-semibold ml-1">
            {{ competition.password ? "Yes" : "No" }}
          </p>
        </div>
        <div class="flex mb-4">
          <p>Status :</p>
          <p class="font-worksans-semibold ml-1">
            {{
              checkCompetitionDate(competition.date_start, competition.date_end)
            }}
          </p>
        </div>
        <div
          class="flex mt-10"
          v-if="$page.props.auth.user.level.role === 'Cuber'"
        >
          <button
            class="
              w-full
              btn
              text-white
              px-6
              py-2.5
              font-worksans-regular
              text-sm
            "
            :class="
              checkCompetitionDate(
                competition.date_start,
                competition.date_end
              ) === 'Opened'
                ? 'bg-third-color'
                : 'bg-gray-500 pointer-events-none'
            "
          >
            {{
              checkCompetitionDate(
                competition.date_start,
                competition.date_end
              ) === "Opened"
                ? "Join now!"
                : checkCompetitionDate(
                    competition.date_start,
                    competition.date_end
                  ) === "Completed"
                ? "Competition is still closed"
                : "The competition is over"
            }}
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  props: {
    competition: Object,
  },
  setup() {},
};
</script>

<style>
</style>